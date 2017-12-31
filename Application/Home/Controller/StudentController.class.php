<?php

namespace Home\Controller;
use Think\Controller;

Class StudentController extends Controller{

    Public function __construct() {
        parent::__construct();
        if(null == session('studentid')) {
            $this->redirect('/Home/index/index');
        }
    }

    /**
     *  展示学生的课程表
     */
    Public function index() {
        $studentInfo = D('Admin/Student')->where(['id'=>session('studentid')])->find();
        $this->assign('studentinfo',$studentInfo);
        $this->display();
    }

    /*
     *  展示修改信息页面
     */
    Public function edit() {
        $studentInfo = D('Admin/Student')->where(['id'=>session('studentid')])->find();
        $studentInfo['zhuanye'] = D('Admin/Subject')->where(['id'=>$studentInfo['zhuanye']])->getField('name');
        $this->assign('studentinfo',$studentInfo);
        $this->display();
    }


    /**
     *  通过session查询学生课表
     */
    Public function ajax_getLessons(){
        $classID = D('Admin/Student')->where(['id'=>session('studentid')])->getField('class');
        $lessonInfo = D('Admin/Lesson')->field('lesson.*,teacher.name as teachername')->where(['lesson.class'=>$classID])->join('teacher ON teacher.id = lesson.teacher')->select();

        foreach($lessonInfo as $k=>$v){
            $lessoninfo[$v['time']] = $v;
        }

        $this->ajaxReturn($lessoninfo);
    }

    /**
     *  ajax修改密码
     */

    Public function ajax_setPassword(){
        $map['salt'] = mt_rand(1111,9999);
        $map['password'] = md5(I('password').$map['salt']);

        $result = D('Admin/Student')->where(['id'=>session('studentid')])->save($map);

        if($result) {
            $data = ['error'=>0];
            session('id',null);
        } else {
            $data = ['error'=>1,'msg'=>'修改密码失败'];
        }

        $this->ajaxReturn($data);
    }

    /*
     *  学生退出登录
     */

    Public function logout() {
        session('studentid',null);
        $this->success('退出成功！跳转到登录页面。','/Home/index/index');
    }
}