<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <title><?php echo $this->page_title; ?></title>
</head>
<body>
<div class="fixed-top row header">
    <div class="col-ld-2 col-md-2 col-sm-1 box-header">
        <div class="brand text-center">
            <a href="#">
                <img src="../assets/images/logo/logo-shop.png" alt="Aries Shoes" class="logo-brand">
                <span class="hidden-sm navbar-brand">
                            ARIES SHOES
                        </span>
            </a>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-11 box-header right-header">
        <div class="header-content row">
            <div class="btn-show col-lg-1 col-md-1 col-sm-3 col-">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="user col-lg-3 col-md-3 col-sm-9 float-end">
                <div class="row">
                    <div class="name col-lg-8 col-md-8 hidden-sm text-right">
                        Hà Thanh Hoàng
                        <div class="online">
                            <span>Online</span>
                        </div>
                    </div>
                    <div class="avatars col-lg-4 col-md-4 col-sm-12 text-center has-btn-user">
                        <div class="avatar">
                            <img src="../assets/images/avatars/user2-160x160.jpg" alt="Hà Thanh Hoàng" width="60">
                        </div>
                        <div class="btn-user">
                            <div class="btn-infor">
                                <a href="" class="btn btn-success btn-block">
                                    Thông tin cá nhân
                                </a>
                            </div>
                            <div class="btn-signout">
                                <a href="" class="btn btn-danger btn-block">
                                    Đăng xuất
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-page row">
    <div class="col-ld-2 col-md-2 col-sm-1" style="background: #fff; height: 100vh">
        <div class="side-bar">
            <div class="user-info">
                <div class="avatar">
                    <img src="../assets/images/avatars/user2-160x160.jpg" alt="Hà Thanh Hoàng" width="100">
                </div>
            </div>
        </div>
        <div class="menu-bar">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    A list item
                    <span class="badge bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    A second list item
                    <span class="badge bg-primary rounded-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    A third list item
                    <span class="badge bg-primary rounded-pill">1</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-11" style="background: #F1F2F7; height: 100vh">
        <?php echo $this->content; ?>
    </div>
</div><script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!--CKEditor -->
<script src="assets/ckeditor/ckeditor.js"></script>
<!--My SCRIPT-->
<script src="assets/js/script.js"></script>
</body>
</html>