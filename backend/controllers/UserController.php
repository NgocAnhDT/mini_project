<?php
//controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
    public $userModel;

    public function __construct() {
        $this->userModel= new User();
    }

    public function login() {
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Login";
        $msg_error=[];
        if (isset($_POST['btn_login'])){
            if(empty($_POST['username'])){
                $msg_error['username']="Hãy nhập username";
            } elseif (strlen($_POST['username']) < 4){
                $msg_error['username']="Hãy nhập username tối thiểu 4 kí tự";
            } else {
                $username = $_POST['username'];
            }

            if (empty($_POST['password'])){
                $msg_error['password']="Hãy nhập password";
            } elseif (strlen($_POST['password']) < 6) {
                $msg_error['password'] = "Hãy nhập password tối thiểu 6 kí tự";
            } else {
                $pass = $_POST['password'];
            }

            if (!empty($username) && !empty($pass)) {
                if($this->userModel->check_login($username, $pass)){
                    $_SESSION['login_id'] = true;
                    header("Location: index.php");
                } else {
                    $msg_error[] = 'username hoặc password không đúng, vui lòng đăng nhập lại';
                }
            }
        }

        if(!empty($msg_error)){
            $this->error= $msg_error;
        }

        $this->content = $this->render('views/users/login.php');

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main-login.php';
    }

    public function logout() {
        // unset các Session khi login thành công
        //
        session_destroy();
        $_SESSION['success'] = "Đăng xuất thành công";
        header("Location: index.php?controller=user&action=login");
        exit();
    }
}