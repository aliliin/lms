<?php

namespace App\Admin\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Tools;

use Encore\Admin\Show;
use App\Models\Category;

class AuditProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品审核';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->selector(function (Tools\Selector $selector) {
            $selector->select('audit_status', '审核状态', [
                0 => '未进行审核',
                1 => '审核已通过',
                2 => '审核未通过'
            ]);
        });
        $grid->id('ID')->sortable();
        $grid->product_core('商品编码');
        $grid->title('商品名称');
        $grid->bar_code('国条码');
        $grid->category_id('商品分类')->display(function ($category_id) {
            return Category::where('id', $category_id)->first()->name;
        });
        $grid->status('已上架')->display(function ($status) {
            return $status ? '是' : '否';
        });
        $grid->audit_status('审核状态')->display(function ($audit_status) {
            if ($audit_status == 1) {
                return '审核已通过';
            } elseif ($audit_status == 2) {
                return '审核未通过';
            } else {
                return '未进行审核';
            }
//            return $audit_status ? '审核通过' : '审核未通过';
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
        $show->field('long_title', __('Long title'));
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
        $form = new Form(new Product());

        $form->text('product_core', __('Product core'));
        $form->text('title', __('Title'));
        $form->text('long_title', __('Long title'));
        $form->text('bar_code', __('Bar code'));
        $form->number('category_id', __('Category id'));
        $form->switch('status', __('Status'));
        $form->select('audit_status', '审核状态')->options(
            [0 => '未进行审核', 1 => '审核已通过', 2 => '审核未通过']
        );
        $form->number('shop_id', __('Shop id'));
        $form->number('description_id', __('Description id'));
        $form->decimal('rating', __('Rating'));
        $form->number('sold_count', __('Sold count'));
        $form->number('review_count', __('Review count'));
        $form->decimal('price', __('Price'));
        $form->image('image', __('Image'));

        return $form;
    }
}
