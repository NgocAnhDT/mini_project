<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class UserController extends Controller {
    public function login() {
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Form đăng nhập";
        $this->content = $this->render('views/users/login.php');

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main-login.php';
    }

    public function logout() {
        // unset các Session khi login thành công
        //

        $_SESSION['success'] = "Đăng xuất thành công";
        header("Location: index.php?controller=user&action=login");
        exit();
    }
}