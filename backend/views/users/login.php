<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/users/login.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <div class="form__box">
        <div class="form__left">
            <div class="form__padding"><img class="form__image" src="assets/images/logo-shop.png"/></div>
        </div>
        <div class="form__right">
            <div class="form__padding-right">
                <form>
                    <p class="form__title">Member Login</p>
                    <div class="form__group">
                        <label><i class="login_icon fas fa-user"></i></label>
                        <input type="text" name="username" placeholder="Username"
                               value="<?php
                                            echo isset($_POST['username']) ? $_POST['username']:'';
                                            echo isset($_COOKIE['username']) ? $_COOKIE['username']:''; ?>"/>
                    </div>
                    <div class="form__group">
                        <label><i class="login_icon fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Password"
                               value="<?php echo isset($_POST['password']) ? $_POST['password']:'';
                                            echo isset($_COOKIE['password']) ? $_COOKIE['password']:''; ?>"/>
                    </div>
                    <!--CheckBox-->
                    <div class="form__remember">
                        <input type="checkbox" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked':''; ?>>
                        <span>Remember me</span>
                    </div>

                    <input type="submit" name="btn_login" value="Login"/>


                </form>
                <p> <a class="form__link" href="#">Create your account</a></p>
            </div>
        </div>
    </div>
    </form>
</body>
</html>