<?php 
    session_start();
    session_regenerate_id();
    // check session isset or no
    if(!isset($_SESSION['email_member']) || !isset($_SESSION['password_member'])):
      header("location: ../../",true);
      exit;
    endif;

    function daynamic($name){
        global $pageName;
        if(isset($pageName) && $pageName == $name):
            echo "active";
        endif;
    }
?>
<!DOCTYPE html>
<html
  lang="ar"
  class="light-style layout-menu-fixed"
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

    <title><?php echo $pageName; ?></title>

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

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

<!--        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">-->
<!--          <div class="app-brand demo">-->
<!--            <a href="index.php" class="app-brand-link">-->
<!--              <img src="../assets/img/icons/logo.png" width="200px">-->
<!--            </a>-->
<!---->
<!--            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">-->
<!--              <i class="bx bx-chevron-left bx-sm align-middle"></i>-->
<!--            </a>-->
<!--          </div>-->
<!---->
<!--          <div class="menu-inner-shadow"></div>-->
<!---->
<!--          <ul class="menu-inner py-1">-->
<!--             Dashboard -->
<!--            <li class="menu-item --><?php //daynamic('لوحة التحكم'); ?><!--">-->
<!--              <a href="index.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bx-home-circle"></i>-->
<!--                <div data-i18n="Analytics">الرئيسية</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic('التقارير'); ?><!--">-->
<!--              <a href="report.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-report"></i>-->
<!--                <div data-i18n="Analytics">التقارير</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--             Layouts -->
<!--            <li class="menu-item --><?php //daynamic('المنتجات'); ?><!--">-->
<!--              <a href="product.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-t-shirt"></i>-->
<!--                <div data-i18n="t-shirt">المنتجات</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic('الطلبات'); ?><!--">-->
<!--              <a href="order.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-package"></i>-->
<!--                <div data-i18n="package">الطلبات</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic('مراجعات'); ?><!--">-->
<!--              <a href="rating.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bx-calendar-star"></i>-->
<!--                <div data-i18n="package">مراجعات</div>-->
<!--              </a>-->
<!--            </li>-->
<!--            -->
<!--            <li class="menu-item --><?php //daynamic('السحب'); ?><!--">-->
<!--              <a href="wallet.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-wallet"></i>-->
<!--                <div data-i18n="package">ألسحب</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!---->
<!--        </aside>-->
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            <a href="home.php" class="nav-item">
            <img src="../assets/img/icons/logo.png" width="150px" style=" padding: 10px;display: block;margin: 0 auto;border-radius: 100px">
            </a>
          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar" dir="ltr"
          >


              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 " style="display: block; ">
                  <div href="javascript:void(0);" class="btn btn-secondary">
                       رقم التاجر : 12345678
                      <i class="menu-icon tf-icons bx bxs-user" style="font-size: 1rem;margin-right: 0;"></i>
                  </div>
              </div>
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 " style="display: block;margin: 0 auto; ">
                  <div href="javascript:void(0);" class="btn btn-secondary">
العملاء التابعين لمتجرك : 20
<i class="menu-icon tf-icons bx bxs-user " style="font-size: 1rem;margin-right: 0;"></i>
                  </div>
              </div>
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 " style="display: block;margin: 0 auto; ">
                  <a href="javascript:void(0);" class="btn btn-secondary">
                      جمالي
                      <i class="menu-icon bx bx-home" style="font-size: 1rem;margin-right: 0;"></i>
                  </a>
              </div>
          </nav>

          <!-- / Navbar -->