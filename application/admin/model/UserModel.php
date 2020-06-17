<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2020/6/17
 * Time: 14:51
 */

namespace app\admin\model;


use think\Model;

class UserModel extends BaseModel
{
    //模型常用方法
    protected $name = 'user';              //链接数据库表
//    protected $autoWriteTimestamp = true;   //自动写入/读取时间戳。默认写入创建时间(create_time)，更新时间(update_time)。
//    protected $updateTime = 'update';       //更改默认update_time字段为update
//    protected $createTime = false;          //关闭create_time字段的自动写入读取时间戳
//    protected $dateFormat = false;          //关闭时间戳自动读取
//    protected $hidden = ['id'];             //不需要读取的字段
//
//
//    //获取器
//    public function getImgAttr($val)
//    {
//        return config('url').$val;
//    }
//
//    //
//    public function getStatusAttr($val)
//    {
//        $status = [0 => '未付款',1 => '待发货',2 => '待收货',3 => '待评价'];
//        return $status[$val];
//    }

}