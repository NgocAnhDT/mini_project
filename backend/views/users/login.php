<?php

?>
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
            <div class="form__padding"><img class="form__image" src="assets/images/b3ca6754727fe02c2bca73db538820ad.jpg"/></div>
        </div>
        <div class="form__right">
            <div class="form__padding-right">
                <form>
                    <p class="form__title">Member Login</p>
                    <div class="form__group">
                        <label><i class="login_icon fas fa-user"></i></label>
                        <input type="text" name="username" placeholder="Username"/>
                    </div>
                    <div class="form__group">
                        <label><i class="login_icon fas fa-lock"></i></label>
                        <input type="password" name="password" placeholder="Password"/>
                    </div>

                    <input type="submit" name="btn_login" value="Login"/>
                    <!--CheckBox-->
                    <div class="form__remember">
                        <input type="checkbox" name="remember_login">
                        <label>Remember me</label>
                    </div>
                </form>
                <p> <a class="form__link" href="#">Create your account</a></p>
            </div>
        </div>
    </div>
    </form>
</body>
</html>