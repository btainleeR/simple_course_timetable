<?php

namespace Home\Controller;
use Think\Controller;

Class TeacherController extends Controller {

    Public function __construct() {
        parent::__construct();
        if(null == session('teacherid')) {
            $this->redirect('/Home/index/index');
        }
    }

    /**
     *  展示教师课表页面
     */
    Public function index() {
        //查询老师姓名
        $teacherInfo = D('Admin/Teacher')->where(['id'=>session('teacherid')])->getField('name');
        $this->assign('teacherinfo',$teacherInfo);
        $this->display();
    }

    /**
     *  展示修改老师信息页面
     */
    Public function edit() {
        $teacherInfo = D('Admin/Teacher')->where(['id'=>session('teacherid')])->find();
        $teacherInfo['zhicheng'] = unserialize($teacherInfo['zhicheng']);
        $this->assign('teacherinfo',$teacherInfo);
        $this->display();
    }


    /**
     *  获取老师课表的数据
     */
    Public function ajax_getLessons() {
        $lessonInfo = D('Admin/Lesson')->field('lesson.*,class.name as classname')->where(['lesson.teacher'=>session('teacherid')])->join('class ON lesson.class = class.id')->select();

        foreach($lessonInfo as $k=>$v) {
            $lessoninfo[$v['time']] = $v;
        }

        $this->ajaxReturn($lessoninfo);
    }

    /**
     *  修改老师的密码
     */
    Public function ajax_setPassword() {
        if(null == I('password')) {
            exit;
        }
        $map['salt'] = mt_rand(1111,9999);
        $map['password'] = md5(I('password').$map['salt']);

        $result = D('Admin/Teacher')->where(['id'=>session('teacherid')])->save($map);

        if($result) {
            $data = ['error'=>0];
        } else {
            $data = ['error'=>1,'msg'=>'修改密码失败'];
        }

        $this->ajaxReturn($data);
    }

    /**
     *  教师退出登录
     */
    Public function logout() {
        session('teacherid',null);
        $this->success('退出成功','/Home/index/index');
    }
}