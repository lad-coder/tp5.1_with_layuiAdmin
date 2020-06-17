<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2020/6/17
 * Time: 14:54
 */

namespace app\admin\controller;


use app\admin\model\UserModel;
use app\admin\validate\LoginMastBeHavior;
use think\facade\Session;

class User extends BaseController
{
    protected $userModel;
    /**
     * 中间件
     * @param UserModel $userModel
     */
    public function __construct(UserModel $userModel)
    {
        parent::_initialize();
        parent::__construct();
        $this->userModel = $userModel;
    }

    /**
     * 登录
     * @return mixed
     */
    public function login()
    {
        if ($this->request->isPost()) {
            $validate = new LoginMastBeHavior();
            $param = $this->request->param();
            if (!$validate->scene('login')->check($param)) {
                $this->error_return($validate->getError());
            }
            $info = $this->userModel->getInfo(['username' => $param['username']]);
            if ($info['code'] != 'ok') {
                $this->error_return($info['msg']);
            }
            if ($info['data']['password'] != md5($param['password'])) {
                $this->error_return('密码错误');
            }
            Session::set('id',$info['data']['id']);
            $this->success_return('登录成功');
        }
        return $this->fetch();
    }
}