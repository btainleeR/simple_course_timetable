<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    /**
     *  展示登录页面
     */
    Public function index() {
        $this->display('index');
    }
}