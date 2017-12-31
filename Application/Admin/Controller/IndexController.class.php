<?php
namespace Admin\Controller;
use Think\Controller;

Class IndexController extends Controller{
    Public function __construct() {
        parent::__construct();
        if(null == session('adminid')) {
            $this->redirect('/Home/Index/index');
        }
    }


    /**
     *  展示统计信息
     */
    Public function index() {
        $data['teachernumber'] = D('Teacher')->count();
        $data['subjectnumber'] = D('Subject')->count();
        $data['classnumber'] = D('Class')->count();
        $data['studentnumber'] = D('Student')->count();
        $this->assign('data',$data);
        $this->display();
    }

    /**
     *  退出登录
     */
    Public function logout() {
        session('adminid',null);
        $this->success('退出成功！即将跳转到登录页面','/Home/Index/index');
    }
}