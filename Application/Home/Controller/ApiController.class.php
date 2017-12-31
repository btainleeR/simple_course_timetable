<?php
    namespace Home\Controller;
    use Home\Model\AdminModel;
    use Home\Model\StudentModel;
    use Home\Model\TeacherModel;
    use Think\Controller;

    Class ApiController extends Controller{
        //每个API调用都必须通过session验证，未登录用户不能直接调用API。

        Public $model = null;


        Public function index(){
            //
        }

        //用户登录
        Public function login() {
            $role = I('role');
            $username = I('username');
            $password = I('password');

            switch($role) {
                case 0:
                    $this->model = D('Admin/Admin');
                    break;
                case 1:
                    $this->model = D('Admin/Student');
                    break;
                case 2:
                    $this->model = D('Admin/Teacher');
                    break;
            }

            $result_username = $this->model->where(['name'=>$username])->count();
            if($result_username) {
                $salt = $this->model->where(['name'=>$username])->getField('salt');
                $result_password = $this->model->where(['name'=>$username,'password'=>md5($password.$salt)])->count();
            }

            if($result_password) {
                $id = $this->model->where(['name'=>$username])->getField('id');

                //生成session认证文件
                switch($role) {
                    case 0:
                        session('adminid',$id);
                        break;
                    case 1:
                        session('studentid',$id);
                        break;
                    case 2:session('teacherid',$id);
                        break;
                }
                $data = array(
                    'error' => 0,
                    'msg'   => '',
                    'data'  =>'',
                );
            }else{
                $data = array(
                    'error' =>  1,
                    'msg'   =>  '用户名/密码错误',
                    'data'  =>  '',
                );
            }

            $this->ajaxReturn($data);
        }

        Public function logout(){
            session('studentid',null);
            session('teacherid',null);
            session('adminid',null);
            $this->redirect('/Home/index/index');
        }
    }