<?php

namespace Admin\Controller;
use Think\Controller;

Class StudentController extends Controller {

    Public function __construct() {
        parent::__construct();
    }
    Public function index(){

        //班级信息列表
        $classInfo = D('Class')->field('id,name')->select();
        $this->assign('classinfo',$classInfo);

        $this->display();
    }

    /**
     *  展示添加学生的页面
     */
    Public function add(){

        //班级信息列表
        $classInfo = D('Class')->field('id,name')->select();
        $this->assign('classinfo',$classInfo);

        //专业信息列表
        $subjectInfo = D('Subject')->select();
        $this->assign('subjectinfo',$subjectInfo);

        $this->display();
    }

    /**
     * 展示修改学生信息页面
     */
    Public function edit(){
        //页面生成信息查询
        $subjectInfo = D('Subject')->select();
        $classInfo  = D('Class')->field('id,name')->select();
        $this->assign('subjectinfo',$subjectInfo);
        $this->assign('classinfo',$classInfo);
        //学生信息查询
        $studentInfo = D('Student')->where(['id'=>I('id')])->field('id,name,number,sex,zhuanye,grade,class')->find();
        $this->assign('studentinfo',$studentInfo);
        $this->display();
    }

    /**
     *  ajax添加新的学生
     */
    Public function ajax_addStudent() {
        $data = array(
            'name' => I('name'),
            'number' => I('number'),
            'sex' => I('sex'),
            'zhuanye' => I('zhuanye'),
            'grade' => I('grade'),
            'class' => I('iclass'),
        );
        $data['salt'] = mt_rand(1111,9999);
        $data['password'] = md5(I('password').$data['salt']);

        // 学号重复性检查
        $count = D('Student')->where(['number'=>I('number')])->count();
        if($count) {
            $this->ajaxReturn(['error'=>1,'msg'=>'学号冲突!']);
            exit;
        }

        //写入数据库
        $result = D('Student')->add($data);

        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'写入数据库出错'];
        }

        $this->ajaxReturn($data);
    }

    /**
     *  ajax查询班级的所有学生
     */
    Public function ajax_showStudent() {
        $data = D('Student')->where(['class'=>I('id')])->field('id,name,number,sex,zhuanye,grade,class')->select();
        //可读化数据
        foreach($data as $k=>$v){
            $data[$k]['sex'] = getSexNameByVal($v['sex']);
            $data[$k]['zhuanye'] = getSubjectNameById($v['zhuanye']);
            $data[$k]['class'] = getClassNameById($v['class']);
        }
        $this->ajaxReturn($data);
    }

    /**
     *  ajax删除学生信息记录
     */
    Public function ajax_deleteStudent() {
        $result = D('Student')->where(['id'=>I('id')])->delete();

        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'删除数据时发生错误!'];
        }

        $this->ajaxReturn($data);
    }

    /**
     * ajax更新学生信息
     */
    Public function ajax_editStudent() {

        $data = array(
            'name' => I('name'),
            'number' => I('number'),
            'sex' => I('sex'),
            'zhuanye' => I('zhuanye'),
            'grade' => I('grade'),
            'class' => I('iclass'),
        );
        if( null != I('password')) {
            $data['password'] = I('password');
        }

        $result = D('Student')->where(['id'=>I('id')])->save($data);

        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'修改信息时发生错误'];
        }

        $this->ajaxReturn($data);
    }
}