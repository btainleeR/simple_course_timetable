<?php

namespace Admin\Controller;
use Think\Controller;

Class MyclassController extends Controller {

    Public function __construct() {
        parent::__construct();
    }

    //展示班级
    Public function index() {

        $classModel = D('Class');
        $data = $classModel->select();
        $this->assign('data',$data);
        $this->display();
    }

    //展示新增班级页面
    Public function add() {

        //查询专业生成下拉列表
        $subjectModel = D("Subject");
        $subject = $subjectModel->select();
        $this->assign('subject',$subject);

        $this->display();
    }

    //ajax查询新增班级是否已经存在
    Public function ajax_isClassExist() {
        $name = I('name');
        $result = D('Class')->where(['name'=>$name])->count();

        if($result || $name == '') {
            $data = ['error'=>1,'msg'=>'班级名已经存在'];
        }else {
            $data = ['error'=>0,'msg'=>''];
        }

        $this->ajaxReturn($data);
    }


    //ajax查询新的班级号是否已经存在
    Public function ajax_isNumberExist() {
        $number = I('number');

        $result = D('Class')->where(['number'=>$number])->count();

        if($result || $number == '') {
            $data = ['error'=>1];
        } else {
            $data = ['error'=>0];
        }

        $this->ajaxReturn($data);
    }

    //ajax新增班级信息
    Public function ajax_addClass() {
        $data['name'] = I('name');
        $data['number'] = I('number');
        $data['zhuanye'] = I('zhuanye');

        $result = D('Class')->add($data);
        if($result) {
            $data = ['error'=>0,'msg'=>'班级添加成功'];
        }else {
            $data = ['error'=>1,'msg'=>'班级添加失败'];
        }

        $this->ajaxReturn($data);
    }

    //展示修改信息页面
    Public function edit() {
        $id = I('id');
        //查询班级信息
        $classInfo = D('Class')->where(['id'=>$id])->find();
        $this->assign('classinfo',$classInfo);

        //查询专业信息生成下拉列表
        $subjectInfo = D('Subject')->select();
        $this->assign('subjectinfo',$subjectInfo);
        $this->assign('id',$id);
        $this->display();
    }
    //ajax删除班级信息
    Public function ajax_deleteClass() {
        $id = I('id');
        $result = D('Class')->where(['id'=>$id])->delete();
        if(result) {
          $data = ['error'=>0,'msg'=>'删除成功'];
        } else{
            $data = ['error'=>1,'msg'=>'未能找到班级信息,无法删除!'];
        }

        $this->ajaxReturn($data);
    }
    //ajax修改班级信息

    Public function ajax_modifyClass() {
        $data['name'] = I('name');
        $data['number'] = I('number');
        $data['zhuanye'] = I('zhuanye');

        $result = D('Class')->where(['id'=>I('id')])->save($data);

        if($result) {
            $data = ['error'=>0];
        }else {
            $data = ['error'=>1,'msg'=>'修改发生错误'];
        }
        $this->ajaxReturn($data);
    }
}