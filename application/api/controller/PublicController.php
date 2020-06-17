<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2020/6/17
 * Time: 14:44
 */

namespace app\api\controller;


use Firebase\JWT\JWT;
use think\Controller;
use think\exception\HttpResponseException;
use think\Response;

class PublicController extends Controller
{

    /**
     * @param $user_id
     * @return string
     */
    public function jwt($user_id)
    {
        $key = config('key');
        $data = [
            "iss" => "name",
            "aud" => "describe",
            'user_id' => $user_id,
        ];
        return JWT::encode($data, $key);
    }
    /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param mixed $msg 提示信息
     * @param mixed $data 返回的数据
     * @param array $header 发送的Header信息
     * @return void
     */
    protected function success_return($msg = '', $data = '', array $header = [])
    {
        $code   = 200;
        $result = [
            'code' => $code,
            'msg'  => $msg,
            'data' => $data,
        ];

        $response = Response::create($result, 'json')->header($header);
        throw new HttpResponseException($response);
    }

    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param mixed $msg 提示信息,若要指定错误码,可以传数组,格式为['code'=>您的错误码,'msg'=>'您的错误消息']
     * @param mixed $data 返回的数据
     * @param array $header 发送的Header信息
     * @return void
     */
    protected function error_return($msg = '', $data = '', array $header = [])
    {
        $code = 603;
        if (is_array($msg)) {
            $code = $msg['code'];
            $msg  = $msg['msg'];
        }
        $result = [
            'code' => $code,
            'msg'  => $msg,
            'data' => $data,
        ];
        $response = Response::create($result, 'json')->header($header);
        throw new HttpResponseException($response);
    }
}