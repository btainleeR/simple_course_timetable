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
                <h1>查看课表</h1>
                <select name="class"  class="form-control" id="classid">
                    <option value="" >请选择班级</option>
                    <?php if(is_array($classinfo)): foreach($classinfo as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
                </select>
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


    <script src="/Public/admin/layer/layer.js"></script>
    <script type="text/javascript">

        var teacherOption = "<?php if(is_array($teacherinfo)): foreach($teacherinfo as $key=>$vo): ?><option value='<?php echo ($vo["id"]); ?>'><?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>";
        //选择班级后根据服务器返回信息生成新的课表
        $('#classid')
            .bind('change',function(){
                var classid = $(this).val();
                $.ajax({
                    type: "POST",
                    data: {
                        class:classid,
                    },
                    url: '/Admin/Lesson/ajax_getLessons',
                    success : function(data) {
                       $('tbody').html('');
                       if(data == null) {
                           data = '1';
                       }
                      create(data);
                    },
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
                        ihtml += '<td value="'+id+'" ondblclick="javascript:popModifyLesson('+id+')">'+data[id].name+'</td>';
                    }else {
                        ihtml += '<td value="'+id+'" ondblclick="javascript:popAddLesson('+id+')"></td>';
                    }
                }
                ihtml += '</tr>';
            }
            $('tbody').append(ihtml);
        }

        //根据一节课的详细信息生成弹窗
        function createModifyHtml(data,id){
            var ihtml = '<div style="padding:20px;">\n' +
                '    <div class="form-group">\n' +
                '      <label for="name" class="control-label">课程名称</label>\n' +
                '      <input type="text" name="name" id="name" class="form-control" value="'+data.name+'">\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="teacher" class="control-label">任课老师</label>\n' +
                '      <select  id="iteacher" class="form-control">\n' +
                          teacherOption      +
                '      </select>\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="number" class="control-label">开课号</label>\n' +
                '      <input type="text" name="number" id="number" class="form-control" value="'+data.number+'">\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="last" class="control-label">学时</label>\n' +
                '      <input type="text" id="last" class="form-control" value="'+data.last+'">\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="score" class="control-label">学分</label>\n' +
                '      <input type="text" name="score" id="score" class="form-control" value="'+data.score+'">\n' +
                '    </div>\n' +
                '    <div class="col-md-6 col-md-offset3">\n' +
                '      <button class="btn btn-info" onclick="javascript:modifylesson('+id+')">提交</button>\n' +
                '    </div>\n' +
                '  </div>';
            return ihtml;
        }

        //弹出添加课程的弹窗
        function popAddLesson(id){
            var ihtml = '<div style="padding:20px;">\n' +
                '    <div class="form-group">\n' +
                '      <label for="name" class="control-label">课程名称</label>\n' +
                '      <input type="text" name="name" id="name" class="form-control">\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="teacher" class="control-label">任课老师</label>\n' +
                '      <select  id="iteacher" class="form-control">\n' +
                            teacherOption      +
                '      </select>\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="number" class="control-label">开课号</label>\n' +
                '      <input type="text" name="number" id="number" class="form-control">\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="last" class="control-label">学时</label>\n' +
                '      <input type="text" id="last" class="form-control">\n' +
                '    </div>\n' +
                '    <div class="form-group">\n' +
                '      <label for="score" class="control-label">学分</label>\n' +
                '      <input type="text" name="score" id="score" class="form-control">\n' +
                '    </div>\n' +
                '    <div class="col-md-6 col-md-offset3">\n' +
                '      <button class="btn btn-info" onclick="javascript:addlesson('+id+')">提交</button>\n' +
                '    </div>\n' +
                '  </div>';

            layer.open({
                type: 1,
                area: ['600px', '600px'],
                shadeClose: true, //点击遮罩关闭
                content: ihtml,
            });
        }


        //弹出修改课程的弹窗
        function popModifyLesson(id) {
            var iclass = $('#classid').val();

            $.ajax({
                type: "POST",
                data: {
                    class:iclass,
                    time:id
                },
                url: "/Admin/Lesson/ajax_getLessoninfo",
                success: function(data){
                    var ihtml = createModifyHtml(data,id);
                    layer.open({
                        type: 1,
                        area: ['600px', '600px'],
                        shadeClose: true, //点击遮罩关闭
                        content: ihtml,
                    });
                    $('#iteacher').val(data.teacher);
                }
            });
        }



        //ajax添加课程
        function addlesson(time) {
            var iclass = $('#classid').val();
            var name = $('#name').val();
            var number = $('#number').val();
            var time = time;
            var last  =$('#last').val();
            var score = $('#score').val();
            var teacher = $('#iteacher').val();


            $.ajax({
                type: "POST",
                data: {
                    name:name,
                    number:number,
                    time:time,
                    last:last,
                    score:score,
                    teacher:teacher,
                    class:iclass
                },
                url: '/Admin/Lesson/ajax_addLesson',
                success: function (data) {
                    if(data.error == 0) {
                    window.location = '/Admin/Lesson/index';
                    } else {
                        alert(data.msg);
                    }
                }
            })


        }

        //ajax修改课程
        function modifylesson(time) {
            var iclass = $('#classid').val();
            var name = $('#name').val();
            var number = $('#number').val();
            var time = time;
            var last = $('#last').val();
            var score = $('#score').val();
            var teacher = $('#iteacher').val();


            $.ajax({
                type: "POST",
                data: {
                    name: name,
                    number: number,
                    time: time,
                    last: last,
                    score: score,
                    teacher: teacher,
                    class: iclass
                },
                url: '/Admin/Lesson/ajax_modifyLesson',
                success: function (data) {
                    if (data.error == 0) {
                        window.location = '/Admin/Lesson/index';
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }
    </script>

</body>
</html>