<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SB Admin - Start Bootstrap Template</title>
    <link href="/Public/admin/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/admin/css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/Public/admin/css/admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer " id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">课程信息管理系统</a>
    <small>欢迎你，管理员。</small>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="index.html">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li> -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#student" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">学生信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="student">
                    <li>
                        <a href="navbar.html">新增学生信息</a>
                    </li>
                    <li>
                        <a href="cards.html">修改学生信息</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#teacher" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">教师信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="teacher">
                    <li>
                        <a href="navbar.html">添加老师信息</a>
                    </li>
                    <li>
                        <a href="cards.html">修改老师信息</a>
                    </li>
                    <li>
                        <a href="">查询老师</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#lesson" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">课程信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="lesson">
                    <li>
                        <a href="navbar.html">添加课表</a>
                    </li>
                    <li>
                        <a href="cards.html">修改课表</a>
                    </li>
                    <li>
                        <a href="">查看课表</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-link"></i>
                    <span class="nav-link-text">Link</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>安全退出</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            input:text.form-control
        </div>
    </div>
</div>
<script src="/Public/admin/css/vendor/jquery/jquery.min.js"></script>
<script src="/Public/admin/css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>