<?php

/**
 * @param $id  专业id
 * @return mixed    专业名
 */
function getSubjectNameByid($id){
    return D('Subject')->where(['id'=>$id])->getField('name');
}

/**
 * @param $val 性别对应值
 * @return string 性别
 */
function getSexNameByVal($val) {
    return $val ? '女' : '男' ;
}

/**
 * @param $val 性别对应值
 * @return null|string 性别图标样式
 */
function getSexButtonByVal($val) {
    switch ($val) {
        case 0:
            $ihtml = '<button class="btn btn-info"><a class="fa fa-male"></a>男</button>';
            break;
        case 1:
            $ihtml = '<button class="btn btn-danger"><a class="fa fa-female"></a>女</button>';
            break;
        default:
            $ihtml = null;
    }
    return $ihtml;
}

/**
 * @param $id  班级id
 * @return mixed 班级名
 */
function getClassNameById($id) {
    return D('Class')->where(['id'=>$id])->getField('name');
}

/**
 * @param $arr 职称数组
 * @return string 多彩按钮代码
 */
function getZhichengButton($arr) {
    $html = '';
    foreach($arr as  $v) {
        if(null != $v) {
            $html .= '<button class="'.getRandButtonClass().'">'.$v.'</button>&nbsp;';
        }
    }
    return $html;
}

/**
 * @return mixed 返回随机的按钮的类名(bootstrap)
 */
function getRandButtonClass() {
    $style = array(
        1=>'btn btn-default',
        2=>'btn btn-primary',
        3=>'btn btn-info',
        4=>'btn btn-danger',
        5=>'btn btn-warning',
    );
    return $style[mt_rand(2,5)];
}

/**
 *  退出登录
 */
function loginOut() {
    session('adminid',null);
    session('teacherid',null);
    session('studentid',null);

}