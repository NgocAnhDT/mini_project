<?php
//controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';

class UserController extends Controller {
    public function login() {
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Login";
        $msg_error=[];
        $userModel = new User();

        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            $row = $userModel->check_user($_COOKIE['username'], $_COOKIE['password']);
            if($row){
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['fullname'] = $row['fullname'];
                header("Location: index.php");
                exit();
            }
        } else {
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
                    $row = $userModel->check_user($username, $pass);
                    if($row){
                        $time_expire = 60*60*24*10;  //10 days
                        if(isset($_POST['remember'])){
                            setcookie('username', $username, time()+ $time_expire);
                            setcookie('password', $pass, time() + $time_expire);
                        }
                        $_SESSION['logged'] = true;
                        $_SESSION['username'] = $username;
                        $_SESSION['fullname'] = $row['fullname'];
                        header("Location: index.php");
                    } else {
                        $msg_error[] = 'username hoặc password không đúng, vui lòng đăng nhập lại';
                    }
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
        unset($_SESSION['logged']);
        unset($_SESSION['username']);
        unset($_SESSION['fullname']);
        //xóa cookie, thiết lập thời gian hết hạn là 1s trước
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            setcookie('username','', time() - 1);
            setcookie('password','', time()- 1);
        }
        $_SESSION['success'] = "Đăng xuất thành công";
        header("Location: index.php?controller=user&action=login");
        exit();
    }
}