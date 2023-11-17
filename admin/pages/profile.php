<?php
    session_start();
    // check session isset or no
    if(!isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['password'])):
      header("location: ../",true);
      exit;
    endif;

    require "../../inc/config/db.php";

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
        $login = $conn->prepare("UPDATE admin SET username = :username, email = :email, password = :password WHERE id = 1");
        $login->bindParam("username",$username);
        $login->bindParam("email",$email);
        $login->bindParam("password",$password);
        if($login->execute()){
         // here if secssfuly update data
         $_SESSION['username'] = $username;
         $_SESSION['email'] = $email;
         $_SESSION['password'] = $password;
        
         echo "<script>
                  alert('تم تحديث بيانات بناجح');
                document.location = 'profile.php';
              </script>";
         exit;
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
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>الملف شخصي</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/icons/logo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.php" class="app-brand-link gap-2">
                  <span class="app-brand-text demo text-body fw-bolder">تعديل الملف شخصي</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">مرحبا بك عزيزي المدير 👋</h4>

              <form id="formAuthentication" class="mb-3" method="POST">
                
                <div class="mb-3">
                  <label for="email" class="form-label">الاسم المستخدم</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="الاسم المستخدم"
                    value="<?php echo $_SESSION['username']; ?>"
                    autofocus
                    required
                  />
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">البريد الكتروني</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="info@example.com"
                    value="<?php echo $_SESSION['email']; ?>"
                    autofocus
                    required
                  />
                </div>

                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">كلمة السر</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                  </div>
                </div>

                  <a href="index.php" class="text-primary">رجوع للوحة التحكم</a>
                
                <div class="mb-3">
                  <button class="btn btn-dark d-grid w-100 mt-2" type="submit" name="login">حفظ معلومات</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
