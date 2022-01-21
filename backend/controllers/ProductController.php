<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller {

    public function index() {
        $product_model = new Product();
        $products = $product_model->listData();
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Quản lý sản phẩm";
        $this->content = $this->render('views/products/index.php', ['products' => $products]);

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }

    public function create() {
//        echo "<pre>";
//        print_r($_POST);
//        print_r($_FILES);
//        echo "</pre>";
        if (isset($_POST['submit'])) {
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $brand = ''; $size = ''; $color = '';
            $brand_value = $_POST['brand'];
            switch ($brand_value) {
                case 0: $brand = "Adidas"; break;
                case 1: $brand = "Nike"; break;
                case 2: $brand = "Puma"; break;
                case 3: $brand = "Converse"; break;
            }
            // + Validate form:
            if (empty($product_name)){
                $this->error = "Chưa nhập tên sản phẩm!";
            } elseif (empty($price)) {
                $this->error = "Chưa nhập giá bán!";
            } elseif (!is_numeric($price)) {
                $this->error = "Giá bán phải là số!";
            } elseif ($_FILES['product_image']['error'] == 0){
                $extension = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
                $alowed = ['png', 'jpg', 'jpeg', 'gif'];
                if(!in_array($extension, $alowed)){
                    $this->error = "File tải lên phải là ảnh";
                } elseif ($_FILES['product_image']['size'] > 2*1024*1024){
                    $this->error = "Dung lượng file tải lên phải nhỏ hơn 2MB";
                }
            } elseif (!isset($_POST['size'])){
                $this->error = "Chưa chọn size giày!";
            } elseif (!isset($_POST['color'])){
                $this->error = "Chưa chọn màu!";
            }

            // + Lưu vào CSDL chỉ khi nào ko có lỗi:
            if (empty($this->error)) {
                $size_value = $_POST['size'];
                switch ($size_value) {
                    case 38: $size = 38; break;
                    case 39: $size = 39; break;
                    case 40: $size = 40; break;
                    case 41: $size = 41; break;
                    case 42: $size = 42; break;
                }
                $color_value = $_POST['color'];
                switch ($color_value) {
                    case 0: $color = "Đỏ"; break;
                    case 1: $color = "Vàng"; break;
                    case 2: $color = "Xanh lam"; break;
                    case 3: $color = "Xanh lá"; break;
                    case 4: $color = "Đen"; break;
                }

                $product_image = '';
                if ($_FILES['product_image']['error'] == 0) {
                    // Khai báo thư mục chứa các file tải lên
                    $dir_uploads = 'assets/images/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    // Tạo tên file upload mang tính duy nhất -> tránh file bị ghi đè khi trùng tên
                    $product_image = time() . '-' . $_FILES['product_image']['name'];
                    // Chuyển file từ thư mục tạm mà XAMPP đang lưu về thư mục đích
                    move_uploaded_file($_FILES['product_image']['tmp_name'], $dir_uploads . '/' . $product_image);

                }
                // Từ Controller gọi Model để nhờ Model tương tác với CSDL -> MVC
                $product_model = new Product();

                $datas = [
                    'product_name' => $product_name,
                    'product_img' => $product_image,
                    'brand' => $brand,
                    'price' => $price,
                    'size' => $size,
                    'color' => $color
                ];
                $is_insert = $product_model->insertData($datas);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới sp thành công';
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
                $this->error = 'Thêm mới sản phẩm thất bại';
            }
        }
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Thêm mới sản phẩm";
        $this->content = $this->render('views/products/create.php');

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Tham số id không hợp lệ!";
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $product_id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getOne($product_id);
//
//        echo "<pre>";
//        print_r($product);
//        echo "</pre>";
        if (isset($_POST['submit'])) {
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $brand = ''; $size = ''; $color = '';
            $brand_value = $_POST['brand'];
            switch ($brand_value) {
                case 0: $brand = "Adidas"; break;
                case 1: $brand = "Nike"; break;
                case 2: $brand = "Puma"; break;
                case 3: $brand = "Converse"; break;
            }
            // + Validate form:
            if (empty($product_name)){
                $this->error = "Chưa nhập tên sản phẩm!";
            } elseif (empty($price)) {
                $this->error = "Chưa nhập giá bán!";
            } elseif (!is_numeric($price)) {
                $this->error = "Giá bán phải là số!";
            } elseif ($_FILES['product_image']['error'] == 0){
                $extension = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
                $alowed = ['png', 'jpg', 'jpeg', 'gif'];
                if(!in_array($extension, $alowed)){
                    $this->error = "File tải lên phải là ảnh";
                } elseif ($_FILES['product_image']['size'] > 2*1024*1024){
                    $this->error = "Dung lượng file tải lên phải nhỏ hơn 2MB";
                }
            } elseif (!isset($_POST['size'])){
                $this->error = "Chưa chọn size giày!";
            } elseif (!isset($_POST['color'])){
                $this->error = "Chưa chọn màu!";
            }

            // + Lưu vào CSDL chỉ khi nào ko có lỗi:
            if (empty($this->error)) {
                $size_value = $_POST['size'];
                switch ($size_value) {
                    case 38: $size = 38; break;
                    case 39: $size = 39; break;
                    case 40: $size = 40; break;
                    case 41: $size = 41; break;
                    case 42: $size = 42; break;
                }
                $color_value = $_POST['color'];
                switch ($color_value) {
                    case 0: $color = "Đỏ"; break;
                    case 1: $color = "Vàng"; break;
                    case 2: $color = "Xanh lam"; break;
                    case 3: $color = "Xanh lá"; break;
                    case 4: $color = "Đen"; break;
                }

                $product_image = $product['product_img'];
                if ($_FILES['product_image']['error'] == 0) {
                    $dir_uploads = 'assets/images/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $product_image = time() . '-' . $_FILES['product_image']['name'];
                    // Chuyển file từ thư mục tạm mà XAMPP đang lưu về thư mục đích
                    move_uploaded_file($_FILES['product_image']['tmp_name'], $dir_uploads . '/' . $product_image);
                }
                $product_model = new Product();

                $datas = [
                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_img' => $product_image,
                    'brand' => $brand,
                    'price' => $price,
                    'size' => $size,
                    'color' => $color
                ];
                $is_update = $product_model->update($datas);
                if ($is_update) {
                    $_SESSION['success'] = "Sửa thông tin sản phẩm #$product_id thành công";
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
                $this->error = "Sửa thông tin sản phẩm #$product_id thất bại";
            }
        }
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Sửa thông tin sản phẩm";
        $this->content = $this->render('views/products/update.php', ['product' => $product]);

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Tham số id không hợp lệ!";
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $product_id = $_GET['id'];
        $product_model = new Product();
        $is_delete = $product_model->delete($product_id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=product&action=index');
        exit();
    }

    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Tham số id không hợp lệ!";
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $product_id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getOne($product_id);

        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/detail.php', ['product' => $product]);

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }
}