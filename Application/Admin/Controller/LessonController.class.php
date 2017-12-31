<?php

namespace Admin\Controller;
use Think\Controller;

Class LessonController extends Controller {

    Public function __construct() {
        parent::__construct();
    }

    /**
     *  展示班级课表
     */
    Public function index() {
        //查询班级信息
        $classInfo = D('Class')->field('id,name')->select();
        $this->assign('classinfo',$classInfo);

        $teacherInfo = D('teacher')->field('id,name')->select();
        $this->assign('teacherinfo',$teacherInfo);
        $this->display();
    }

    /**
     *  展示老师课表
     */
    Public function teacher() {
        $teacherInfo = D('Teacher')->field(['id,name'])->select();
        $this->assign('teacherinfo',$teacherInfo);
        $this->display();
    }




    //添加课程到数据库
    Public function ajax_addLesson() {
        $result = D('Lesson')->add($_POST);

        if($result) {
            $data = ['error'=> 0];
        } else {
            $data = ['error'=> 1,'msg'=>添加失败];
        }

        $this->ajaxReturn($data);
    }

    //修改课程到数据库
    Public function ajax_modifyLesson() {
        $map = Array(
            'time'=>I('time'),
            'class'=>I('class'),
        );
        $result = D('Lesson')->where($map)->save($_POST);

        if($result) {
            $data = ['error'=> 0];
        } else {
            $data = ['error'=> 1,'msg'=>添加失败];
        }

        $this->ajaxReturn($data);
    }

    /**
     *  查询一个班级的课表信息
     */

    Public function ajax_getLessons() {
        $class = I('class');
        $lessons = D('Lesson')->where(['class'=>$class])->select();

        foreach($lessons as $k => $v) {
            $lessonInfo[$v['time']] = $v;
        }

        $this->ajaxReturn($lessonInfo);
    }

    /**
     *  查询一节课的详细信息
     */
    Public function ajax_getLessoninfo() {
        $map['class'] = I('class');
        $map['time'] = I('time');

        $lessoninfo = D('Lesson')->where($map)->select();

        $this->ajaxReturn($lessoninfo[0]);
    }

    /**
     *  查询老师所有的课
     */
    Public function ajax_getTeacherLessons() {
        $lessonInfo = D('Lesson')->field('lesson.*,class.name as classname')->where(['teacher'=>I('teacher')])->join('class ON lesson.class = class.id')->select();
        foreach( $lessonInfo as $k=>$v){
            $lessoninfo[$v['time']] = $v;
        }
        $this->ajaxReturn($lessoninfo);
    }
}