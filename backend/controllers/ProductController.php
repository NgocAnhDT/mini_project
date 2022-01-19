<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller {
    public function create() {
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Thêm mới sản phẩm";
        $this->content = $this->render('views/products/create.php');

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }
}