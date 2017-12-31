<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SB Admin - Start Bootstrap Template</title>
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
    <h3 >欢迎你,<?php echo ($teacherinfo); ?>老师。</h3>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="index.html">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li> -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Home/Teacher/edit');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">修改资料</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Home/Teacher/index');;?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">查看课表</span>
                </a>
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
                <a class="nav-link" data-toggle="modal" href="<?php echo U('/Home/Teacher/logout');?>">
                    <i class="fa fa-fw fa-sign-out"></i>安全退出</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="page-header">
                <h1>个人信息修改</h1>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="form-group">
                        <label for="name" class="control-label">姓名:</label>
                        <input type="text"  id="name" class="form-control" disabled value="<?php echo ($teacherinfo['name']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">设置密码:</label>
                        <input type="text" id="password" placeholder="留空则保留原密码" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="number" class="control-label">教工号:</label>
                        <input type="text" id="number" class="form-control" disabled value="<?php echo ($teacherinfo['number']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label">性别:</label>
                        <input type="text" id="sex" class="form-control" disabled value="<?php echo (getSexNameByVal($teacherinfo['sex'])); ?>">
                    </div>
                    <div class="form-group">
                        <label for="zhicheng" class="control-label">职称:</label>
                        <div id="zhicheng">
                            <?php echo (getZhichengButton($teacherinfo['zhicheng'])); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="job" class="control-label">职务</label>
                        <input type="text" id="job" class="form-control" disabled value="<?php echo ($teacherinfo['job']); ?>">
                    </div>
                    <div class="from-group">
                        <button class="btn btn-info" onclick="javascript:edit()">
                            <span class="glyphicon glyphicon-plane"></span>
                            修改密码
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        console.log(<?php echo ($teacherinfo['zhicheng']); ?>);
        //修改密码
        function edit() {
           var password = $('#password').val();
           if(undefined != password) {
               $.ajax({
                   type: "POST",
                   data: {
                       password:password,
                   },
                   url: '/Home/Teacher/ajax_setPassword',
                   success: function(data) {
                       if(data.error == 0) {
                           window.location = '/Home/Teacher/index';
                       }else {
                           alert(data.msg);
                       }
                   }
               });
           }
        }
    </script>

</body>
</html>