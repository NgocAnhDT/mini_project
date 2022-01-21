<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';

class HomeController extends Controller {
    public function index() {
        $this->page_title = "Trang chủ";
        $this->content = $this->render('views/layouts/home.php');

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }
}