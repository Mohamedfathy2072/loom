<?php
    session_start();
    session_regenerate_id(); 

    require "../inc/config/db.php";
    // here nav deperment
    @$itemesnav = $conn->query("SELECT * FROM category LIMIT 8 OFFSET 0");

    // here url page
    $url_automatics = "https://".$_SERVER['HTTP_HOST'];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title><?php echo $pageName; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- meta tag help seo -->
    <meta name="description" content="الوصف هنا">
    <meta name="keywords" content="كلمات,المفتاحية">
    <!-- here icon -->
    <link rel="icon" type="image/x-icon" href="<?= $url_automatics ?>/assets/img/icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url_automatics ?>/assets/img/icon.png">
    <link rel="apple-touch-icon" href="<?= $url_automatics ?>/assets/img/apple-icon.png">
    <!-- here css file and bootstrap -->
    <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/templatemo.css">
    <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/custom.css">
    <?php if($pageName == "لوم كارت"): ?>
      <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/cart.css">

    <?php 
      endif; 
        
        if($pageName == "الطلبات" || $pageName == "اكواد الخصم" || $pageName == "لوم باي" || $pageName == "العناوين" || $pageName == "طريقة الدفع"): 
    ?>
      <link href='<?= $url_automatics ?>/assets/styleLibary/boxicons/css/boxicons.css' rel='stylesheet'>
      <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/order.css">

    <?php 
      endif; 
        if($pageName == "المنتج"): 
      ?>
      <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/productstyle.css">
    <?php
      endif; 
        if($pageName == "حسابي"): 
      ?>
      <link rel="stylesheet" href="<?= $url_automatics ?>/login/css/custom.css">
    <?php endif; ?>
      
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= $url_automatics ?>/assets/styleLibary/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php if($pageName == "طريقة الدفع" || $pageName == "لوم كارت"): ?>     
      <!-- here style loader -->
      <link rel="stylesheet" href="<?= $url_automatics ?>/assets/css/loader.css" id="styleloader">
    <?php endif; ?>

  </head>
<body>

   <!-- Header -->
   <nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-black align-self-center" href="../">
            <img src="<?= $url_automatics ?>/assets/img/logo.png" class="logo-icon">
        </a>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            
            
            <div class="flex-fill">

                <form method="GET" class="modal-content modal-body border-0 p-0">
                  
                    <div class="input-group mb-2" style="padding: 0px 50px;">
                      <?php if($pageName == "المتجر" || $pageName == "المنتج"): ?>
                          <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="البحث....">
                      <?php endif; ?> 
                    </div>
                </form>

            </div>
            <div class="navbar align-self-center d-flex">

                

                <?php require_once "list.php"; ?>

                <a class="tajawal position-relative align-self-center border-0 rounded-0 text-decoration-none me-4 icon-navbar" href="<?= $url_automatics ?>/page/cart.php">
                   <img src="<?= $url_automatics ?>/assets/img/icons/loomcart.svg" class="img-fluid" style="width: 45px">
                </a>
                  <a href="<?= $url_automatics ?>/page/cart.php" class="me-1 icon-navbar border-0 cairo align-self-center text-decoration-none">
                          لوم كارت
                  </a>

            </div>
        </div>

    </div>
</nav>
<!-- Close Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black line-height-navgations" style="z-index: 0;">
    <div class="container-fluid" dir="ltr">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0 text-center d-none">
          
          <li class="nav-item me-3">
            <a class="nav-link cairo active" href="<?= $url_automatics ?>">ألرئيسية</a>
          </li>

          <li class="nav-item me-3">
            <a class="nav-link cairo active" href="<?= $url_automatics ?>/page/about.php">حولنا</a>
          </li>

          <?php foreach($itemesnav AS $showitems): ?>
            <li class="nav-item me-3">
              <a class="cairo nav-link active" href="<?= $url_automatics ?>/page/store.php?id=<?php echo $showitems["id"]; ?>"><?php echo $showitems["Title"]; ?></a>
            </li>
          <?php endforeach; ?>

          <li class="nav-item me-3">
            <a class="nav-link cairo active" href="<?= $url_automatics ?>/page/shop.php">الاخرى</a>
          </li>

          <li class="nav-item me-3">
            <a class="nav-link cairo active" href="<?= $url_automatics ?>/page/myheart.php">المفضلات</a>
          </li>

          <li class="nav-item me-3">
            <a class="nav-link cairo active" href="<?= $url_automatics ?>/page/contact.php">اتصل بنا</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>
  <!-- end header and menu -->