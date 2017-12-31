<?php

namespace Admin\Controller;
use Think\Controller;

Class SubjectController extends COntroller {

    Public function __construct() {
        parent::__construct();
    }

    Public function index() {

        $subjectModel = D('Subject');
        $data = $subjectModel->select();
        $this->assign('data',$data);
        $this->display();
    }

    Public function delete() {
        $id = I('id');
        $subjectModel = D('Subject');
        $data = $subjectModel->delete($id);

        if($data) {
            $data = array(
                'error' =>  0,
                'msg'   =>  '删除专业信息成功',
                'data'  =>  null,
            );
        } else {
            $data = array(
                'error' => 1,
                'msg'   =>  '删除专业信息失败',
                'data'  =>  null,
            );
        }
        $this->ajaxReturn($data);
    }

    Public function add() {

        $subjectModel = D("Subject");

        $data['name']  = I('subjectName');
        //专业名重复检查
        $exist = $subjectModel->where(['name'=>$data['name']])->count();
        if($exist) {
            $data = ['error'=>1,'msg'=>'专业已经存在'];
            $this->ajaxReturn($data);
            exit;
        }

        //添加专业进数据库
        $result = $subjectModel->data($data)->add();
        if($result) {
            $info = $subjectModel->where(['name'=>$data['name']])->find();
            $data = ['error'=>0,'msg'=>'专业添加成功','id'=>$info['id'],'name'=>$info['name']];
        } else {
            $data = ['error'=>1,'msg' => '专业添加失败'];
        }
        $this->ajaxReturn($data);
    }


}