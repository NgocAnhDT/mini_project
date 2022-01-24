<?php
//controllers/ProductController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller {

    function convert_name($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        $str = preg_replace("/( )/", '-', $str);
        return $str;
    }

    public function index() {
        $product_model = new Product();
        $products = $product_model->listData();
        $amount = $product_model->amount();
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Quản lý sản phẩm";
        $this->content = $this->render('views/products/index.php', ['products' => $products, 'amount' => $amount]);

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
                $this->error['product_name'] = "Chưa nhập tên sản phẩm!";
            }
            if (empty($price)) {
                $this->error['price'] = "Chưa nhập giá bán!";
            }
            if (!is_numeric($price)) {
                $this->error['price'] = "Giá bán phải là số!";
            }
            if ($_FILES['product_image']['error'] == 0){
                $extension = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
                $alowed = ['png', 'jpg', 'jpeg', 'gif'];
                if(!in_array($extension, $alowed)){
                    $this->error['product_img'] = "File tải lên phải là ảnh";
                } elseif ($_FILES['product_image']['size'] > 2*1024*1024){
                    $this->error['product_img'] = "Dung lượng file tải lên phải nhỏ hơn 2MB";
                }
            }
            if (!isset($_POST['size'])){
                $this->error['size'] = "Chưa chọn size giày!";
            }
            if (!isset($_POST['color'])){
                $this->error['color'] = "Chưa chọn màu!";
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
                    $product_image = time() . '-' . $this->convert_name($product_name);
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
                    $_SESSION['success'] = 'Thêm sản phẩm mới thành công';
                    header('Location: index.php?controller=product&action=index');
                    exit();
                }
                $this->error['error'] = 'Thêm mới sản phẩm thất bại';
            }
        }
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $product_amount = new Product();
        $amount = $product_amount->amount();
        $this->page_title = "Thêm mới sản phẩm";
        $this->content = $this->render('views/products/create.php', ['amount' => $amount]);

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
        if(empty($product)){
            $_SESSION['error'] = "Không tồn tại sản phẩm có id = $product_id!";
            header("Location: index.php?controller=product&action=index");
            exit();
        }
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
                $this->error['product_name'] = "Chưa nhập tên sản phẩm!";
            }
            if (empty($price)) {
                $this->error['price'] = "Chưa nhập giá bán!";
            }
            if (!is_numeric($price)) {
                $this->error['price'] = "Giá bán phải là số!";
            }
            if ($_FILES['product_image']['error'] == 0){
                $extension = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
                $alowed = ['png', 'jpg', 'jpeg', 'gif'];
                if(!in_array($extension, $alowed)){
                    $this->error['product_img'] = "File tải lên phải là ảnh";
                } elseif ($_FILES['product_image']['size'] > 2*1024*1024){
                    $this->error['product_img'] = "Dung lượng file tải lên phải nhỏ hơn 2MB";
                }
            }
            if (!isset($_POST['size'])){
                $this->error['size'] = "Chưa chọn size giày!";
            }
            if (!isset($_POST['color'])){
                $this->error['color'] = "Chưa chọn màu!";
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
                    $product_image = time() . '-' . $this->convert_name($product_name);
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
                $this->error['error'] = "Sửa thông tin sản phẩm #$product_id thất bại";
            }
        }
        // - Gán thông tin cụ thể theo chức năng hiện tại
        $this->page_title = "Sửa thông tin sản phẩm";
        $product_amount = new Product();
        $amount = $product_amount->amount();
        $this->content = $this->render('views/products/update.php', ['product' => $product, 'amount' => $amount]);

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
        $product = $product_model->getOne($product_id);
        if(empty($product)){
            $_SESSION['error'] = "Không tồn tại sản phẩm có id = $product_id!";
            header("Location: index.php?controller=product&action=index");
            exit();
        }
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
        if(empty($product)){
            $_SESSION['error'] = "Không tồn tại sản phẩm có id = $product_id!";
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $amount = $product_model->amount();

        $this->page_title = "Chi tiết sản phẩm";
        $this->content = $this->render('views/products/detail.php', ['product' => $product, 'amount' => $amount]);

        // - Gọi layout để hiển thị các thông tin trên
        require_once 'views/layouts/main.php';
    }
}