<?php

namespace Admin\Controller;
use Think\Controller;

Class TeacherController extends Controller {
    Public function __construct() {
        parent::__construct();
    }

    /**
     *  展示老师信息主页面
     */
    Public function index() {
        $teacherInfo = D('Teacher')->select();
        foreach($teacherInfo as $k=>$v) {
            $teacherInfo[$k]['zhicheng'] = unserialize($v['zhicheng']);
        }
        $this->assign('teacherinfo',$teacherInfo);
        $this->display();
    }

    /**
     *  展示添加老师信息页面
     */
    Public function add() {
        $this->display();
    }

    /**
     * 展示编辑老师信息页面
     */
    Public function edit() {
        $teacherInfo = D('Teacher')->where(['id'=>I('id')])->field('id,name,number,sex,zhicheng,job')->find();
        $teacherInfo['zhicheng'] = implode(',',unserialize($teacherInfo['zhicheng']));
        $this->assign('teacherinfo',$teacherInfo);
        $this->display();
    }

    /**
     * ajax添加老师信息
     */
    Public function ajax_addTeacher(){
        $data = array(
            'name' => I('name'),
            'salt' => mt_rand(1111,9999),
            'password' => md5(I('password').$data['salt']),
            'number' => I('number'),
            'sex' => I('sex'),
            'zhicheng' => serialize(explode(',',I('zhicheng'))),
            'job' => I('job'),
        );

        //教工号唯一性检验
        $count = D('Teacher')->where(['number'=>$data['number']])->count();
        if($count) {
            $data = ['error'=>1,'msg'=>'教工号冲突'];
            exit;
        }
        //加入数据库
        $result = D('Teacher')->add($data);

        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'写入老师信息失败！'];
        }

        $this->ajaxReturn($data);
    }

    /**
     *  ajax删除老师信息
     */
    Public function ajax_deleteTeacher() {
        $result = D('Teacher')->delete(I('id'));
        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'删除信息时出错'];
        }

        $this->ajaxReturn($data);
    }

    /**
     *  ajax修改老师信息
     */
    Public function ajax_editTeacher(){
        $data = array(
            'name' => I('name'),
            'number' => I('number'),
            'sex' => I('sex'),
            'zhicheng' => serialize(explode(',',I('zhicheng'))),
            'job' => I('job'),
        );
        if( null != I('password')) {
            $data['salt'] = mt_rand(1111,9999);
            $data['password'] = md5(I('password').$data['salt']);
        }

        $result = D('Teacher')->where(['id'=>I('id')])->save($data);

        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'修改信息时发生错误'];
        }

        $this->ajaxReturn($data);
    }
}