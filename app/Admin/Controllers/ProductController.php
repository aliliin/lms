<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SyncOneProductToES;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());
        // 先查询当前登陆的用户的所有店铺ID
        $shopId = Shop::select('id')
            ->where('admin_user_id', Auth::guard('admin')->user()->id)
            ->get()->toArray();
        // 根据店铺ID查询他所有的店铺 一个用户可以创建多个店铺
        $grid->model()->whereIn('shop_id', $shopId);

        $grid->id("ID")->sortable();
        $grid->product_core('商品编码');
        $grid->title("商品名称");
        $grid->bar_code("国条码");
        $grid->category_id('商品分类')->display(function ($category_id) {
            return Category::where('id', $category_id)->first()->name;
        });
        $grid->status('已上架')->display(function ($status) {
            return $status ? '是' : '否';
        });
        $grid->audit_status('审核状态')->display(function ($audit_status) {
            return $audit_status ? '审核通过' : '审核未通过';
        });
        $grid->shop_id('所属店铺')->display(function ($shop_id) {
            return Shop::where('id', $shop_id)->first()->name;
        });
        $grid->price('价格');
        $grid->rating('评分');
        $grid->sold_count('销量');
        $grid->review_count('评论数');
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_core', __('Product core'));
        $show->field('title', __('Title'));
        $show->field('bar_code', __('Bar code'));
        $show->field('category_id', __('Category id'));
        $show->field('status', __('Status'));
        $show->field('audit_status', __('Audit status'));
        $show->field('shop_id', __('Shop id'));
        $show->field('description_id', __('Description id'));
        $show->field('rating', __('Rating'));
        $show->field('sold_count', __('Sold count'));
        $show->field('review_count', __('Review count'));
        $show->field('price', __('Price'));
        $show->field('image', __('Image'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Product);

        // 创建一个输入框，第一个参数 title 是模型的字段名，第二个参数是该字段描述
        $form->text('title', '商品名称')->rules('required');
        $form->text('long_title', '商品长标题')->rules('required');

        $form->text('bar_code', '国条码')->rules('required');
        // 创建一个选择图片的框
        $form->image('image', '封面图片')->rules('required|image');

        $form->select('category_id', '商品分类')->options(function ($id) {
            $category = Category::find($id);
            if ($category) {
                return [$category->id => $category->full_name];
            }
        })->ajax('/admin/api/categories?is_directory=0');


        // 创建一组单选框
        $form->radio('status', '上架')->options(['1' => '是', '0' => '否'])->default('0');

        $form->select('shop_id', '所属店铺')->options(function () {
            $shop = Shop::select('id', 'name')->where('admin_user_id', Auth::guard('admin')->user()->id)->get();
            $array = [];
            if ($shop) {
                foreach ($shop as $key => $values) {
                    $array[$values->id] = $values->name;
                }
            }
            return $array;
        })->rules('required');


        //创建一个富文本编辑器
        $form->editor('productdescriptions.description', '商品描述')->rules('required');

        $form->hasMany('images', '商品图片设置', function (Form\NestedForm $form) {
            $form->multipleImage('image_url', '商品详情图片')
                ->sortable()
                ->removable()
                ->required()
                ->options([
                    'dropZoneEnabled' => true, // 该参数允许拖拽上传
                    'browseOnZoneClick' => true, // 该参数允许点击上传
                    'slugCallback' => false, // 该参数是重新选择后依旧保留之前的，并且不会重复显示
                    'uploadUrl' => '#', // 异步上传
                    'showUpload' => false, // 是否显示上传按钮
                    'layoutTemplates' => ['actionUpload' => ''], // 该参数要与uploadUrl结合使用，目 的 为了不是异步上传的，但是能删掉多张图片中的某一张
                    'maxFileCount' => 5, // 该参数是最多只能选择多少张
                ]);
        });

        // 直接添加一对多的关联模型
        $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('description', 'SKU 描述')->rules('required');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
        });

        $form->hasMany('productproperties', '商品属性', function (Form\NestedForm $form) {
            $form->text('name', '属性名称')->rules('required');
            $form->text('value', '属性值')->rules('required');
        });
        // 定义事件回调，当模型即将保存时会触发这个回调
        $form->saving(function (Form $form) {
            $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;

            $form->model()->product_core = strtotime(date('Y-m-d H:i:s', time()));
        });

        $form->saved(function (Form $form) {
            $product = $form->model();
            dispatch(new SyncOneProductToES($product));
        });

        return $form;
    }
}
