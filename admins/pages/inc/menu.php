<?php 
    session_start();
    session_regenerate_id();
    // secure session hijking
    require_once "../../inc/asset/session_hijkaing.php";
    // check session isset or no
    if(!isset($_SESSION['username_admins']) || !isset($_SESSION['email_admins']) || !isset($_SESSION['password_admins'])):
      header("location: ../",true);
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
<!--            <li class="menu-item --><?php //daynamic('النقد والسحب'); ?><!--">-->
<!--              <a href="wallet_order.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-wallet"></i>-->
<!--                <div data-i18n="package">النقد والسحب</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic('العملاء'); ?><!--">-->
<!--              <a href="member.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-group"></i>-->
<!--                <div data-i18n="group">العملاء</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic("نظام بائعين"); ?><!--">-->
<!--              <a href="merchant.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-store"></i>-->
<!--                <div data-i18n="group">نظام البائعين</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic('الاسئلة والتقيمات'); ?><!--">-->
<!--              <a href="quetions.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-comment-detail"></i>-->
<!--                <div data-i18n="comment-detail">الأسئلة والتقيمات</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--            <li class="menu-item --><?php //daynamic('الصفحات التعريفية'); ?><!--">-->
<!--              <a href="pages.php" class="menu-link">-->
<!--                <i class="menu-icon tf-icons bx bxs-news"></i>-->
<!--                <div data-i18n="news">الصفحات التعريفية</div>-->
<!--              </a>-->
<!--            </li>-->
<!---->
<!--        </aside>-->
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar" dir="ltr"
          >


              <div class=" navbar-nav align-items-xl-center me-3 me-xl-0 " style="position: absolute; right: 0;font-weight: bold">
                  <a href="home.php" class="">
                                    <img src="../assets/img/icons/logo.png" width="120px" style="padding: 10px;margin-right: 5px;">
                                </a>
              </div>

            <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse">


              <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar">
                        <i class="menu-icon tf-icons bx bxs-user-circle f-left"></i>
                    </div>                   
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="dd.php">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">لوحة الادمن</span>
                            <small class="text-muted">الادمن الموقع</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">ملف الادمن</span>
                      </a>
                    </li>

                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">تسجيل الخروج</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->