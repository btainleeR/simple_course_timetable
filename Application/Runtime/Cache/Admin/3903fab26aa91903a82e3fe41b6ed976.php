<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>课程管理后台</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.css">
    <link href="/Public/admin/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/admin/css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="/Public/admin/css/admin.css" rel="stylesheet">
    <script src="/Public/admin/css/vendor/jquery/jquery.min.js"></script>
    <script src="/Public/admin/css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Admin/Subject/index');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">专业管理</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Admin/Myclass/index');;?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">班级管理</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#student" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">学生信息管理</span>
                </a>
                <ul class="sidenav-second-level collapse" id="student">
                    <li>
                        <a href="<?php echo U('/Admin/Student/add');?>">新增学生信息</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Admin/Student/index');?>">查找&&修改学生信息</a>
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
                        <a href="<?php echo U('/Admin/Teacher/add');?>">添加老师信息</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Admin/Teacher/index');?>">查询&&修改老师信息</a>
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
                        <a href="<?php echo U('/Admin/Lesson/index');?>">查看&&编辑班级课表</a>
                    </li>
                    <li>
                        <a href="<?php echo U('/Admin/Lesson/teacher');?>">查看老师课表</a>
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
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="<?php echo loginOut();;?>">
                    <i class="fa fa-fw fa-sign-out"></i>安全退出</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="page-header">
                <h1>新增学生信息</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <label for="name" class="control-label">姓名:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">初始密码:</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="number" class="control-label">学号:</label>
                        <input type="text" name="number" id="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label">性别:</label>
                        <select name="sex" id="sex" class="form-control">
                            <option value="0">男</option>
                            <option value="1">女</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="zhuanye" class="control-label">专业:</label>
                        <select name="zhuanye" id="zhuanye" class="form-control">
                            <option value=""></option>
                            <?php if(is_array($subjectinfo)): foreach($subjectinfo as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="grade" class="control-label">年级:</label>
                        <input type="text" name="grade" id="grade" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="iclass" class="control-label">班级:</label>
                        <select name="class" id="iclass" class="form-control">
                            <option value=""></option>
                            <?php if(is_array($classinfo)): foreach($classinfo as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" onclick="javascript:add()"><span class="glyphicon glyphicon-plane"></span>添加</button>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function add() {
            var name = $('#name').val();
            var password = $('#password').val();
            var number = $('#number').val();
            var sex = $('#sex').val();
            var zhuanye = $('#zhuanye').val();
            var grade = $('#grade').val();
            var iclass = $('#iclass').val();

            //保存新的学生信息
            $.ajax({
                type: "POST",
                data: {
                    name:name,
                    password:password,
                    number:number,
                    sex:sex,
                    zhuanye:zhuanye,
                    grade:grade,
                    iclass:iclass,
                },
                url: '/Admin/Student/ajax_addStudent',
                success: function (data) {
                    if(data.error == 0)
                    {
                        window.location = "/Admin/Student/index";
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    </script>

</body>
</html>