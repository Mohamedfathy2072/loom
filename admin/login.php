<?php
session_start();
session_regenerate_id();


// if isset session login
if(isset($_SESSION['username']) && isset($_SESSION['email']) && isset($_SESSION['password'])){
    header("location: pages/home.php",true);
    exit;
}

require "../inc/config/db.php";

if(isset($_POST['login'])):
    // here filter data
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    // here check data
    if(empty($username) || empty($email) || empty($password)){
        echo "<script>
                alert('رجاء املاء بيانات بشكل صحيح');
              </script>";
    }else{

        $password = md5($_POST['password']);

        // here login and check data
        $login = $conn->prepare("SELECT * FROM admin WHERE id = 2 AND username = :username AND email = :email AND password = :password");
        $login->bindParam("username",$username);
        $login->bindParam("email",$email);
        $login->bindParam("password",$password);
        if($login->execute()){

            if($login->rowCount() == 1){
                // here if secssfuly login
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $username;

                header("location: pages/home.php",true);
                exit;

            }else{
                echo '<div class="alert alert-danger alert-dismissible" role="alert">
                  الاسم المستخدم او البريد الكتروني او كلمة السر خطأ
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }

        }
    }
endif;


?>

<!DOCTYPE html>
<html
        lang="ar"
        class="light-style customizer-hide"
        dir="rtl"
        data-theme="theme-default"
        data-assets-path="assets/"
        data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8" />
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>تسجيل الدخول</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/icons/logo.png" />

    <!-- Fonts -->    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="style.css" />

    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
</head>

<body>
<!-- Content -->

<div class="container">
    <div class="forms">
        <div class="form login">
            <div class="app-brand justify-content-center mb-3">
                <img src="assets/img/icons/logo.png" alt="loom" width="55%">
            </div>

            <form action="#">
                <h5 class="mb-3 mt-2" style="text-align: center;">مرحبا بك عزيزي المدير 👋</h5>
                <h5 class="mb-3 " style="text-align: center;">قم بتسجيل حسابك الأن !</h5>




                <div class="input-field button signup-link">
                    <input type="button" value="تسجل الدخول">
                </div>
            </form>

        </div>

        <!-- Register Form -->
        <div class="form signup">
            <div class="app-brand justify-content-center mb-3">
                <img src="assets/img/icons/logo.png" alt="loom" width="55%">
            </div>
            <h4 class="mb-3 mt-2" style="text-align: center;">تسجيل الدخول</h4>

            <form  method="POST">
                <div class="input-field">
                    <input type="text" placeholder="ادخل الاميل الخاص بك"         type="email"
                           id="email"
                           name="email"
                           autocomplete="off"
                           required>
                    <i class="uil uil-envelope "></i>
                </div>
                <div class="input-field">
                    <input  placeholder="اسم المستخدم"
                            type="text"
                            name="username"
                            required
                    >
                    <i class="uil uil-user"></i>
                </div>


                <div class="input-field">
                    <input  class="password" placeholder="كلمة المرور"  type="password"
                           id="password"
                           name="password"

                           aria-describedby="password"
                           required>
                    <i class="uil uil-lock "></i>
                </div>


                <div class="input-field button">
                    <input type="submit" name="login" value="تسجيل الدخول" style="">
                </div>
            </form>


        </div>
    </div>
</div>
<!-- / Content -->
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="assets/vendor/libs/jquery/jquery.js"></script>
<script src="assets/vendor/libs/popper/popper.js"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->

<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- Page JS -->

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
<script src="main.js"></script>

</html>
