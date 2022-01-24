<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class HomeController extends Controller {
    public function index() {
        $this->page_title = "Trang chủ";
        $product_model = new Product();
        $amount = $product_model->amount();
        $this->content = $this->render('views/layouts/home.php' , ['amount' => $amount]);

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }
}