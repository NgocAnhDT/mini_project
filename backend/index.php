<?php

session_start();

// Set lại múi giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');

// + Lấy controller, nếu ko tồn tại thì gán cho HomeController xử lý
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; //products
// + Lấy action, nếu ko tồn tại thì gán cho 1 action mặc định
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; //create

// + Cần nhúng file controller tương ứng vào: products -> ProductController.php
$controller = ucwords($controller); //Product
$controller .= "Controller"; //ProductController
$controller_path = "controllers/$controller.php"; // controllers/ProductController.php

if (!file_exists($controller_path)) {
    die("Trang bạn tìm không tồn tại - 404");
}
require_once "$controller_path";

// + Khởi tạo đối tượng từ class bên trong controller
$obj = new $controller();

// + Gọi phương thức tương ứng để thực thi chức năng từ obj sinh ra -> tham số action từ url:
if (!method_exists($obj, $action)) {
    die("Phương thức $action ko tồn tại trong controller $controller");
}

$obj->$action();

