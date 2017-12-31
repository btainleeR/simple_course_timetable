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
                <h1 >添加班级</h1>
            </div>
                <div class="col-md-8 col-md-offset-2">
                    <div class="form-group has-feedback" id="forname">
                        <label for="name" class="label-control">班级名称:</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group has-feedback" id="fornumber">
                        <label for="number" class="label-control">班级号:</label>
                        <input type="text" name="number" id="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="zhuanye" class="label-control">专业:</label>
                        <select name="zhuanye" id="zhuanye" class="form-control">
                            <?php if(is_array($subject)): foreach($subject as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" onclick="javascript:add()"><span class="glyphicon glyphicon-ok"></span>确认添加</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        //班级名称失去焦点时检查名字是否已经存在
        $('#name')
            .bind('focusout',function(){
                var name = $('#name').val();
                $.ajax({
                    type: "POST",
                    data:{
                        name:name,
                    },
                    url: '/Admin/Myclass/ajax_isClassExist',
                    success: function(data){
                        $('#feedback2').remove();
                        $('#feedback1').remove();
                        if(data.error == 0){
                            var ihtml = '<span id="feedback1" class="glyphicon glyphicon-ok form-control-feedback"></span>';
                            $('#forname').append(ihtml);
                            $('#forname').removeClass('has-error');
                            $('#forname').addClass('has-success');
                            $('#feedback2').remove();
                        } else {

                            var ihtml = '<span id="feedback2" class="help-block">未输入班级名或班级名重复！</span>';
                            $('#forname').append(ihtml);
                            $('#forname').addClass('has-error');
                            $('#forname').removeClass('has-success');
                            $('#feedback1').remove();
                        }
                    }
                });
            });
        //班级号失去焦点时检查班级号是否已经存在
        $('#number')
            .bind('focusout',function(){
               var number = $('#number').val();
               $.ajax({
                   type: "POST",
                   data: {
                       number:number,
                   },
                   url: '/Admin/Myclass/ajax_isNumberExist',
                   success: function(data) {
                       $('#number-feedback2').remove();
                       $('#number-feedback1').remove();
                       if(data.error == 0) {
                           var ihtml = '<span id="number-feedback1" class="glyphicon glyphicon-ok form-control-feedback"></span>';
                           $('#fornumber').append(ihtml);
                           $('#fornumber').removeClass('has-error');
                           $('#fornumber').addClass('has-success');
                           $('#number-feedback2').remove();
                       } else {
                           var ihtml = '<span id="number-feedback2" class="help-block">未输入班级编号或班级编号重复！</span>';
                           $('#fornumber').append(ihtml);
                           $('#fornumber').addClass('has-error');
                           $('#fornumber').removeClass('has-success');
                           $('#number-feedback1').remove();
                       }
                   }
               });
            });

        //检验并提交数据

        function add() {
            var name = $('#name').val();
            var number = $('#number').val();
            var zhuanye = $('#zhuanye').val();

            $.ajax({
                type: "POST",
                url: '/Admin/Myclass/ajax_addClass',
                data: {
                    name:name,
                    number:number,
                    zhuanye:zhuanye,
                },
                success:function(data){
                    if( data.error == 0) {
                        window.location = '/Admin/Myclass/index';
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }


    </script>

</body>
</html>