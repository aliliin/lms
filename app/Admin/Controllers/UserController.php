<?php

namespace App\Admin\Controllers;

use App\Models\UserRole;
use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a grid builder.
     * 用户管理页面表格
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->username('用户名称');
        $grid->column('role_id', '用户等级')->display(function ($role_id) {
            return UserRole::where('role_id', $role_id)->first()->role_name;
        });
        $grid->vender_type('登陆类型')->display(function ($vender_type) {
            return $vender_type ? "WeChat" : "QQ";
        });
        $grid->status('用户状态')->display(function ($status) {
            return $status ? "是" : "否";
        });;
        $grid->mobile('手机号码')->display(function ($mobile) {
            return $mobile ? $mobile : "未绑定";
        });
        $grid->login_ip('最后一次登陆IP');
        $grid->created_at('注册时间');
        $grid->updated_at('最后一次修改时间');
        $grid->disableCreateButton();
        $grid->tools(function($tools){
            $tools->batch(function($batch){
                $batch->disableDelete();
            });
        });
//        $grid->column('id', __('Id'));
//        $grid->column('Openid', __('Openid'));
//        $grid->column('password', __('Password'));
//        $grid->column('mobile', __('Mobile'));
//        $grid->column('remember_token', __('Remember token'));
//        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Openid', __('Openid'));
        $show->field('username', __('Username'));
        $show->field('password', __('Password'));
        $show->field('role_id', __('Role id'));
        $show->field('vender_type', __('Vender type'));
        $show->field('status', __('Status'));
        $show->field('mobile', __('Mobile'));
        $show->field('login_ip', __('Login ip'));
        $show->field('remember_token', __('Remember token'));
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
        $form = new Form(new User());

        $form->text('Openid', __('Openid'));
        $form->text('username', __('Username'));
        $form->password('password', __('Password'));
        $form->number('role_id', __('Role id'));
        $form->switch('vender_type', __('Vender type'));
        $form->switch('status', __('Status'));
        $form->mobile('mobile', __('Mobile'));
        $form->text('login_ip', __('Login ip'));
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
