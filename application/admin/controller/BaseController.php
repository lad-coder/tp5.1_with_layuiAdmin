<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2020/6/17
 * Time: 14:44
 */

namespace app\admin\controller;


use think\facade\Session;

class BaseController extends PublicController
{
    public $admin_id = null;

    /**
     * 登录验证
     */
    protected function _initialize()
    {
        //管理员验证
        $session_admin_id = Session::get('id');
        var_dump($session_admin_id);
//        if ($session_admin_id > 0) {
//            $this->admin_id = $session_admin_id;
//        } else {
//            $this->redirect('user/login');
//        }
    }
}