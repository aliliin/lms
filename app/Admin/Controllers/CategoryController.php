<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->id('ID')->sortable();
        $grid->name('分类名称');
        $grid->level('分类层级');

        $grid->is_directory('是否目录')->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->path('类目路径');

        $grid->actions(function ($actions) {
            /** 不展示 Laravel-admin 默认的查看按钮 */
            $actions->disableView();
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
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('parent_id', __('Parent id'));
        $show->field('is_directory', __('Is directory'));
        $show->field('level', __('Level'));
        $show->field('path', __('Path'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($isEditing = false)
    {
        $form = new Form(new Category());

        $form->text('name', '分类名称')->rules('required');
        // 新增还是修改
        if ($isEditing) {
            $form->display('is_directory', '是否目录')->with(function ($val) {
                return $val ? '是' : '否';
            });
            $form->display('parent.name', '父目录');
        } else {
            $form->radio('is_directory', '是否目录')
                ->options(['1' => '是', '0' => '否'])
                ->default('0')->rules('required');
            $form->select('parent_id', '父目录')
                ->ajax('/admin/api/categories');
        }

        return $form;
    }

    /** 分类 */
    public function apiIndex(Request $request)
    {
        $search = $request->input('q');
        $res = Category::query()->where('is_directory', 1)
            ->where('name', 'like', '%' . $search . '%')
            ->paginate();
        
        // 组织后台展示的格式
        $res->setCollection($res->getCollection()->map(function (Category $categories) {
            return ['id' => $categories->id, 'text' => $categories->full_name];
        }));
        return $res;
    }
}
