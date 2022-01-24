<?php
//    session_start();
    if(!isset($_SESSION['logged'])){
        $_SESSION['error'] = "Bạn chưa đăng nhập";
        header("Location: index.php?controller=user&action=login");
    }

?>
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
    <link href="assets/css/themify-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <title><?php echo $this->page_title; ?></title>
</head>
<body>
<div class="fixed-top row header">
    <div class="col-ld-2 col-md-2 col-sm-1">
        <div class="brand text-center">
            <a href="index.php?controller=home&action=index">
                <img src="assets/images/logo-shop.png" alt="Aries Shoes" class="logo-brand">
                <span class="hidden-sm navbar-brand hidden-md">
                    ARIES SHOES
                </span>
            </a>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-11">
        <div class="header-content row">
            <div class="btn-show col-lg-1 col-md-1 col-sm-3 col-">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="user col-lg-3 col-md-3 col-sm-9 float-end">
                <div class="row">
                    <div class="name col-lg-8 col-md-8 hidden-sm text-right">
                        <?php echo $_SESSION['fullname'];?>
                        <div class="online">
                            <span>Online</span>
                        </div>
                    </div>
                    <div class="avatars col-lg-4 col-md-4 col-sm-12 text-center has-btn-user">
                        <div class="avatar">
                            <img src="assets/images/user2-160x160.jpg" alt="">
                        </div>
                        <div class="btn-user">
                            <div class="btn-logout">
                                <a href="index.php?controller=user&action=logout" class="btn btn-danger btn-block">
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
    <div class="col-ld-2 col-md-2 col-sm-1">
        <div class="side-bar">
            <div class="user-info text-center">
                <div class="avatar">
                    <img src="assets/images/user2-160x160.jpg" alt="<?php echo $_SESSION['fullname'];?>">
                </div>
                <div class="admin">
                    <?php echo $_SESSION['fullname']?><br> <?php echo $_SESSION['username']?>
                </div>
            </div>
            <div class="menu-bar">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="ti-dashboard"></span>
                        <a href="index.php?controller=home&action=index">Dashboard</a>
                        <span class="badge bg-primary rounded-pill"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="ti-dropbox"></span>
                        <a href="index.php?controller=product&action=index">Quản lý sản phẩm</a>
                        <span class="badge bg-primary rounded-pill">
                            <!--     Code total number of products -->
                            <?php echo $amount; ?>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-10 col-md-10 col-sm-11 main-content">
        <div class="notifications-menu">
            <?php if(isset($_SESSION['success'])) : ?>
                <div class="alert-success">
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['error'])) : ?>
                <div class="alert-danger">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <?php echo $this->content; ?>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<!--My SCRIPT-->
<script src="assets/js/script.js"></script>
<!--<script>-->
<!--    function openMenu() {-->
<!--        document.getElementById("mySidenav").style.left = "0";-->
<!--    }-->
<!---->
<!--    function closeMenu() {-->
<!--        document.getElementById("mySidenav").style.left = "-16%";-->
<!--    }-->
<!--</script>-->

</body>
</html>