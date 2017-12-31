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
    <h3 >欢迎你,<?php echo ($studentinfo['name']); ?></h3>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
              <a class="nav-link" href="index.html">
                <i class="fa fa-fw fa-dashboard"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li> -->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Home/Student/edit');?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">修改资料</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?php echo U('/Home/Student/index');;?>">
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
                <a class="nav-link"  href="<?php echo U('/Home/Student/logout');?>">
                    <i class="fa fa-fw fa-sign-out"></i>安全退出</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="content-wrapper">
        <div class="container">
            <div class="page-header">
                <h1>查看课表信息</h1>
            </div>
            <div class="row">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr style="background-color:grey;height:40px">
                        <th></th>
                        <th>星期一</th>
                        <th>星期二</th>
                        <th>星期三</th>
                        <th>星期四</th>
                        <th>星期五</th>
                        <th>星期六</th>
                        <th>星期日</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(function(){
            $.ajax({
                type: "POST",
                url: "/Home/Student/ajax_getLessons",
                success:function(data){
                    if(data == null){
                        data = '1';
                    }
                    create(data);
                }
            });
        });

        //根据课表信息结构生成课表函数
        function create(data) {
            var ihtml = '';
            for (var i = 1;i < 6; i++){
                ihtml += '<tr><td>第'+i+'节</td>';
                for(var j = 1;j < 8; j++){
                    var id = i*7-7+j;
                    if(undefined != data[id]) {
                        ihtml += '<td value="'+id+'" ondblclick="javascript:popModifyLesson('+id+')">'+data[id].name+'by'+data[id].teachername+'</td>';
                    }else {
                        ihtml += '<td value="'+id+'" ondblclick="javascript:popAddLesson('+id+')"></td>';
                    }
                }
                ihtml += '</tr>';
            }
            $('tbody').append(ihtml);
        }

    </script>

</body>
</html>