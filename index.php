<?php

    session_start();
    session_regenerate_id();  

    // include database
   require_once "inc/config/db.php";


    @$sliderActive = $conn->query("SELECT * FROM slider ORDER BY iD DESC LIMIT 1 OFFSET 0");
    @$sliderActive = $sliderActive->fetch(PDO::FETCH_ASSOC);
    @$sliderActiveImage = $sliderActive['img_file'];

    @$normalSlider = $conn->query("SELECT * FROM slider ORDER BY iD DESC LIMIT 40 OFFSET 1");

    // here nav deperment
    @$itemesnav = $conn->query("SELECT * FROM category");
    // هنا بعد nav
    @$itemes = $conn->query("SELECT * FROM category");

    // عرض المنتجات num 1
    @$product_show = $conn->query("SELECT * FROM `product` ORDER BY ID DESC LIMIT 4 OFFSET 0");

    $product_row_all = $conn->query("SELECT * FROM `product` ORDER BY ID DESC LIMIT 40 OFFSET 4");
    
    $product_row_all_2 = $conn->query("SELECT * FROM `product` ORDER BY ID DESC LIMIT 40 OFFSET 40");
    
    $product_row_all_3 = $conn->query("SELECT * FROM `product_merchant` WHERE status_product = 'تم قبول' ORDER BY ID DESC LIMIT 40 OFFSET 0");
    
    $all_product_footer = $conn->query("SELECT * FROM `product` ORDER BY ID ASC LIMIT 80 OFFSET 0");

    $all_product_footer_merchant = $conn->query("SELECT * FROM `product_merchant` WHERE status_product = 'تم قبول' ORDER BY ID ASC LIMIT 70 OFFSET 40");

    // here category 3 rows
    $category_two = $conn->query("SELECT * FROM category ORDER BY id DESC LIMIT 3 OFFSET 0");

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>Loom لوم</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
    <!-- meta tag help seo -->
    <meta name="description" content="الوصف هنا">
    <meta name="keywords" content="لوم,لوم شوب,متجر لوم,سوق لوم,متجر الكتروني,متجر في السعودية">

    <!-- here icon -->
    <link rel="icon" href="assets/img/icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon.png">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">

    <!-- file css and bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- here style loader -->
    <link rel="stylesheet" href="assets/css/loader.css" id="styleloader">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/styleLibary/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/styleLibary/boxicons/css/animations.css">
    <!-- src swiper -->
    <link rel="stylesheet" href="assets/css/swiper.css">

</head>

<body>

    
    <!-- here loader -->
    <div class="center" id="loader-load">
        <div class="ring"></div>
        <img src="assets/img/icons.png" class="loader">
    </div>
    <!-- end loader -->

<main class="px-3">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-black align-self-center" href="index.php">
                <img src="assets/img/logo.png" class="logo-icon">
            </a>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">

                    <form method="GET" class="modal-content modal-body border-0 p-0">
                        <div class="input-group mb-2" style="padding: 0px 50px;">
                            <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="البحث....">
                        </div>
                    </form>

                </div>
                <div class="navbar align-self-center d-flex">


                <?php require_once "inc/asset/list.php"; ?>

                <a href="page/cart.php" class="tajawal position-relative border-0 rounded-0 align-self-center d-flex text-decoration-none me-4 icon-navbar">
                    <img src="assets/img/icons/loomcart.svg" class="img-fluid" style="width: 45px">
                </a>
                  <a href="page/cart.php" class="me-1 icon-navbar border-0 cairo align-self-center d-flex text-decoration-none">
                          لوم كارت
                  </a>

                </div>
            </div>

        </div>
    </nav>

    <div class="container-fluid py-3" dir="ltr">
        <div class="row text-center">

            <div class="col-lg-3">
                <div class="icon-other-nav"></div>
                <a href="page/addresses.php" class="text-decoration-none cairo text-dark location-icon fs-5">
                    <i class="fa-solid fa-location-dot"></i> 
                    حدد موقع التسليم الخاص بك
                </a>
            </div>

        <?php
            if(isset($_SESSION['email_member']) && isset($_SESSION['password_member'])): 
                // check data user merchant or no
                $check_merchant = $conn->prepare("SELECT * FROM signup_merchant WHERE status_merchants = 'مفعل' AND id_user = :id");
                $check_merchant->bindParam("id",$_SESSION['id']);
                $check_merchant->execute();
                if($check_merchant->rowCount() == 1):
            ?>
            <div class="col-lg-3">
                <div class="icon-other-nav"></div>
                <a href="merchant/pages/home.php" class="text-decoration-none cairo text-dark location-icon fs-5">
                <i class="fa-solid fa-shop"></i>
                    لوحة تحكم البائع
                </a>
            </div>
            
        <?php else: ?>

            <div class="col-lg-3">
                <div class="icon-other-nav"></div>
                <a href="page/policy.php" class="text-decoration-none cairo text-dark location-icon fs-5">
                <i class="fa-solid fa-shop"></i>
                    هل تريد ان تصبح بائع
                </a>
            </div>

        <?php endif; else: ?>

            <div class="col-lg-3">
                <div class="icon-other-nav"></div>
                <a href="page/signup_merchant.php" class="text-decoration-none cairo text-dark location-icon fs-5">
                <i class="fa-solid fa-shop"></i>
                    هل تريد ان تصبح بائع
                </a>
            </div>

        <?php endif; ?>


        
        <div class="col-lg-3">
                <div class="icon-other-nav"></div>
                <a href="#" class="text-decoration-none cairo text-dark location-icon fs-5">
                    <i class="bx bxs-offer bx-tada"></i> 
                        العروض الخاصة
                </a>
            </div>


            <div class="col-lg-3">
                <div class="icon-other-nav"></div>

                <div class="dropdown">
                    <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="#" class="text-decoration-none cairo text-dark location-icon fs-5">
                            <img src="assets/img/icons/category-nav.svg" width="27px">
                            الفئات
                        </a>
                    </div>
                    <ul class="dropdown-menu text-end top-list-style shadow-lg border-0 mb-5 p-2 bg-body rounded" aria-labelledby="dropdownMenuButton1">
                        <?php foreach($itemesnav AS $itemesshow): ?>
                            <li>
                                <a class="dropdown-item cairo secondary-dropdowns" href="page/store.php?id=<?php echo $itemesshow['id']; ?>">
                                    <?php echo $itemesshow['Title']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            

        </div>
    </div>

      <!-- Start Banner Hero -->
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner">

                <div class="carousel-item active">

                    <a href="<?php if(!empty($sliderActive['url'])){
                                echo $sliderActive['url'];
                            }else{
                                echo "javascript:void();";
                            }?>">
                            <div class="mx-auto">
                                <img class="img-fluid lazy" src="assets/img/icons.png" data-src="<?= $sliderActiveImage; ?>" data-srcset="<?= $sliderActiveImage; ?>" style="width:100%;height: 17rem;" alt="الصورة">
                            </div>
                    </a>
                    

                </div>

                <?php 
                foreach($normalSlider AS $slider_show):
                    $normalSliderActiveImage = $slider_show['img_file'];
                ?>
                <div class="carousel-item">
                    
                    <a href="<?php if(!empty($slider_show['url'])){
                            echo $slider_show['url'];
                        }else{
                            echo "javascript:void();";
                        }?>">
                        <div class="mx-auto">
                            <img src="assets/img/icons.png" data-src="<?= $normalSliderActiveImage; ?>" data-srcset="<?= $normalSliderActiveImage; ?>" style="width:100%;height: 17rem;" class="img-fluid w-100 lazy" alt="سلايدر">
                        </div>
                    </a>
                    

                </div>
                <?php endforeach; ?>

                </div>
                <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
                    <i class="fas fa-chevron-left"></i>
                </a>
                <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
                    <i class="fas fa-chevron-right"></i>
                </a>
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Hero -->


    <section class="py-5">
        <!-- Slider main container -->
        <div class="deperments-slider">
            <div class="swiper-container swiper" style="z-index: 0 !important;">
                <div class="swiper-wrapper" style="z-index: 0 !important;">
                    <!-- here slider -->
                <?php foreach($itemes AS $categorys): 
                    $itmesImage = $categorys['image_file'];
                ?>

                    <div class="swiper-slide">
                        <a href="page/store.php?id=<?php echo $categorys['id']; ?>" class="text-decoration-none text-dark cairo">
                            <img src="assets/img/icons.png" data-src="<?php echo $itmesImage; ?>" data-srcset="<?php echo $itmesImage; ?>" alt="Loading" class="lazy">
                            <p class="cairo categorys-product-home"><?php echo $categorys['Title']; ?></p>
                        </a>
                    </div>

                <?php endforeach; ?>

                </div>

            </div>
            </div>
    </section>

    <!-- Start start show product -->
    <section class="container py-5">
        <div class="row">

        <?php foreach($product_show AS $show_product_one): 
            $image_product_one = $show_product_one['img_file'];
            ?>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">

                    <div class="product-image">
                        <a href="page/view.php?id=<?php echo $show_product_one['ID']; ?>" class="image">
                            <img class="lazy img-1" src="assets/img/icons.png" data-src="<?php echo $image_product_one; ?>" data-srcset="<?php echo $image_product_one; ?>" alt="Loading" loading="lazy">
                            <img class="lazy img-2" src="assets/img/icons.png" data-src="<?php echo $image_product_one; ?>" data-srcset="<?php echo $image_product_one; ?>" alt="Loading" loading="lazy">
                        </a>
                        <ul class="product-links">
                            <li><a href="page/favourites.php?fav=<?php echo $show_product_one['ID']; ?>"><i class="fa fa-heart"></i></a></li>
                            <li><a href="page/add_cart.php?cart=<?php echo $show_product_one['ID']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <a href="#" class="product-view"><i class="fa fa-search"></i></a>
                    </div>

                    <div class="product-content">
                        <ul class="rating">
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star"></li>
                            <li class="fas fa-star disable"></li>
                            <li class="disable">(مراجعة 1)</li>
                        </ul>

                        <h3 class="title">
                            <a href="page/view.php?id=<?php echo $show_product_one['ID']; ?>" class="tajawal"><?php echo $show_product_one['title']; ?></a>
                        </h3>

                        <div class="price"><?php echo $show_product_one['price']; ?> ر.س </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>


        </div>
    </section>
    <!-- End end product show -->

    <!-- here product -->
    <section class="py-5">
        <!-- Slider main container -->
        <div class="deperments-slider">
            <h2 class="text-center cairo">منتجات</h2>
            <div class="swiper-container swiper">
                <div class="swiper-wrapper">

                    <!-- here slider -->
                <?php foreach($product_row_all AS $product_show): 
                    $product_row_one = $product_show['img_file'];
                ?>
                    
                        <div class="swiper-slide">
                            <a href="page/view.php?id=<?php echo $product_show['ID']; ?>" class="text-decoration-none text-dark">
                                <img src="assets/img/icons.png" data-src="<?php echo $product_row_one; ?>" data-srcset="<?php echo $product_row_one; ?>" alt="Loading" class="lazy rounded" loading="lazy">
                                <p class="mb-0 cairo title-product-home">
                                    <?php
                                        if(strlen($product_show['title']) <= 20){
                                            echo $product_show['title'];
                                        }else{
                                            echo mb_substr($product_show['title'], 0, 20) ." " . '<span class="text-secondary">....</span>';
                                        }
                                    ?>
                                </p>
                                <p class="cairo price-product-home text-secondary"><?php echo $product_show['price']; ?> ر.س </p>
                            </a>
                        </div>
                <?php endforeach; ?>
                    

                </div>

            </div>
            </div>
            
            <div class="deperments-slider">
            <div class="swiper-container swiper">
                <div class="swiper-wrapper">
                    
                    <!-- here slider -->
                    <?php foreach($product_row_all_2 AS $product_show): 
                        $product_row_one = $product_show['img_file'];
                    ?>
                    
                        <div class="swiper-slide">
                            <a href="page/view.php?id=<?php echo $product_show['ID']; ?>" class="text-decoration-none text-dark">
                                <img src="assets/img/icons.png" data-src="<?php echo $product_row_one; ?>" data-srcset="<?php echo $product_row_one; ?>" alt="Loading" class="lazy rounded" loading="lazy">
                                <p class="mb-0 cairo title-product-home">
                                    <?php
                                        if(strlen($product_show['title']) <= 20){
                                            echo $product_show['title'];
                                        }else{
                                            echo mb_substr($product_show['title'], 0, 20) ." " . '<span class="text-secondary">....</span>';
                                        }
                                    ?>
                                </p>
                                <p class="cairo price-product-home text-secondary"><?php echo $product_show['price']; ?> ر.س </p>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
            </div>
            
            <div class="deperments-slider">
            <div class="swiper-container swiper">
                <div class="swiper-wrapper">

                    <!-- here slider -->
                    <?php foreach($product_row_all_3 AS $product_show): 
                        $product_row_one = $product_show['img_file'];
                    ?>
                    
                        <div class="swiper-slide">
                            <a href="page/views.php?id=<?php echo $product_show['ID']; ?>" class="text-decoration-none text-dark">
                                <img src="assets/img/icons.png" data-src="<?php echo $product_row_one; ?>" data-srcset="<?php echo $product_row_one; ?>" alt="Loading" class="lazy rounded" loading="lazy">
                                <p class="mb-0 cairo title-product-home">
                                    <?php
                                        if(strlen($product_show['title']) <= 20){
                                            echo $product_show['title'];
                                        }else{
                                            echo mb_substr($product_show['title'], 0, 20) ." " . '<span class="text-secondary">....</span>';
                                        }
                                    ?>
                                </p>
                                <p class="cairo price-product-home text-secondary"><?php echo $product_show['price']; ?> ر.س </p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                

                </div>
            </div>
            </div>
    </section>
    <!-- end product -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1 cairo">متاجر</h1>
                <p>
                    بامكانك ان تشاهد العروض الجديدة باسعار جدآ مميزة عن طريق متجرنا
                </p>
            </div>
        </div>
        <div class="row text-center">

            <?php foreach($category_two AS $show_cg): 
                $category_img = $show_cg['image_file'];
            ?>
                <div class="col-12 col-md-4 p-5 mt-3">
                    <a href="page/store.php?id=<?= $show_cg['id']; ?>">
                        <img src="<?= $category_img; ?>" class="rounded-circle img-fluid border" style="height: 280px;" loading="lazy">
                    </a>
                    <h5 class="text-center mt-3 mb-3 cairo"><?= $show_cg['Title']; ?></h5>
                    <p class="text-center">
                        <a href="page/store.php?id=<?= $show_cg['id']; ?>" class="btn btn-outline-dark cairo">اذهب لمتجر</a>
                    </p>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
    <!-- End Categories of The Month -->

  <!-- here section model -->
  <section class="model">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-2 align-self-start text-center">
                <div style="margin-top:30%;">
                    <h2 class="subtitle-model cairo">خصم حتى %70</h2>
                    <h1 class="cairo">الازياء النساء</h1>
                    <p>
                        <a href="page/shop.php" class="btn btn-dark mt-3 btn-lg cairo">شوف الكل</a>
                    </p>
                </div>
            </div>

            <div class="col-md-6 order-1 align-self-end">
                <img src="assets/img/model_content.png" class="img-fluid">
            </div>
                
            </div>
        </div>
    </div>
  </section>
  <!-- end section model -->

    <!-- Start other Product -->
<section class="container-fluid py-5">
    <div class="row justify-content-center">
        <h2 class="py-3 text-center cairo">منتجات متنوعة</h2>
         <?php 
            foreach($all_product_footer AS $show_a_p): 
                $product_all = $show_a_p['img_file'];
            ?>
            <div class="col-md-3">
                <div class="card other mb-4">

                    <div class="card border-0">
                        <a href="page/view.php?id=<?php echo $show_a_p['ID']; ?>" class="text-decoration-none">
                            <img class="lazy card-img rounded-0 img-fluid" src="assets/img/icons.png" data-src="<?php echo $product_all; ?>" data-srcset="<?php echo $product_all; ?>" style="height: 280px;" alt="Loading" loading="lazy">
                        </a>
                    </div>

                    <div class="card-body">
                        <a href="page/view.php?id=<?php echo $show_a_p['ID']; ?>" class="h4 text-dark cairo text-decoration-none">
                        <?php
                            if(strlen($show_a_p['title']) <= 22){
                                echo $show_a_p['title'];
                            }else{
                                echo mb_substr($show_a_p['title'], 0, 22) ." " . '<span class="text-secondary">....</span>';
                            }
                        ?>
                            
                        </a>
                        
                        <p class="cairo text-secondary"><?php echo $show_a_p['price']; ?> ر.س</p>

                        <div class="mt-1 mb-1">
                            <a href="page/add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="btn btn-dark cairo btn-sm float-end text-samlling">
                                الاضافة الى لوم كارت
                            </a>
                            
                            <a href="page/favourites.php?fav=<?php echo $show_a_p['ID']; ?>" class="text-dark cairo text-decoration-none h2 float-start" title="إضافة للمفضلة">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body bg-dark pt-1 pb-1 text-center">
                        <a href="page/add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="text-white text-decoration-none cairo dollar">
                            شراء الآن
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; 
            foreach($all_product_footer_merchant AS $show_a_p): 
                $product_all = $show_a_p['img_file'];
            ?>
            <div class="col-md-3">
                <div class="card other mb-4">

                    <div class="card border-0">
                        <a href="page/views.php?id=<?php echo $show_a_p['ID']; ?>" class="text-decoration-none">
                            <img class="lazy card-img rounded-0 img-fluid" src="assets/img/icons.png" data-src="<?php echo $product_all; ?>" data-srcset="<?php echo $product_all; ?>" style="height: 280px;" alt="Loading" loading="lazy">
                        </a>
                    </div>

                    <div class="card-body">
                        <a href="page/views.php?id=<?php echo $show_a_p['ID']; ?>" class="h4 text-dark cairo text-decoration-none">
                            <?php echo $show_a_p['title']; ?>
                        </a>
                        
                        <p class="cairo text-secondary"><?php echo $show_a_p['price']; ?> ر.س</p>

                        <div class="mt-1 mb-1">
                            <a href="page/add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="btn btn-dark cairo btn-sm float-end text-samlling">
                                الاضافة الى لوم كارت
                            </a>
                            
                            <a href="page/favourites.php?fav=<?php echo $show_a_p['ID']; ?>" class="text-dark cairo text-decoration-none h2 float-start" title="إضافة للمفضلة">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body bg-dark pt-1 pb-1 text-center">
                        <a href="page/add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="text-white text-decoration-none cairo dollar">
                           شراء الآن
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
</section>
    <!-- End Featured Product -->

  <!-- here section model -->
  <section class="model">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ml-auto order-md-1 align-self-start text-center">
                <div style="margin-top:30%;">
                    <h2 class="subtitle-model cairo">خصم حتى %50</h2>
                    <h1 class="cairo">الازياء والاكسورات النساء</h1>
                    <p>
                        <a href="page/shop.php" class="btn btn-dark mt-3 btn-lg cairo">شوف الكل</a>
                    </p>
                </div>
            </div>

            <div class="col-md-6 order-2 align-self-end">
                <img src="assets/img/model_footer.png" class="img-fluid" loading=>
            </div>
                
            </div>
        </div>
    </div>
  </section>
  <!-- end section model -->

    <!-- here menu mobile  -->
    <section class="mobile">
        <div class="menu-mobile bg-white d-none">
            <div class="mobile-icons text-dark d-flex">

                <span class="text-center">
                    <a href="index.php" class="text-center text-decoration-none text-dark d-block">
                        <img src="assets/img/icons/home.svg">
                        <div class="cairo">
                            الرئيسية    
                        </div>
                    </a>
                </span>

                <span class="text-center">
                    <a href="page/shop.php" class="text-center text-decoration-none text-dark d-block">
                        <img src="assets/img/icons/category.svg">
                        <div class="cairo">
                            الفئات    
                        </div>
                    </a>
                </span>

                <span class="text-center">
                    <a href="page/store.php?id=2" class="text-center text-decoration-none text-dark d-block">
                        <img src="assets/img/icons/fashion.png" style="width:20px;">
                        <div class="cairo">
                            العروض    
                        </div>
                    </a>
                </span>

                <span class="text-center">
                    <a href="loom/login/login.php" class="text-center text-decoration-none text-dark d-block">
                        <img src="assets/img/icons/acc.svg">
                        <div class="cairo">
                            حسابي    
                        </div>
                    </a>
                </span>

                <span class="text-center">
                    <a href="page/cart.php" class="text-center text-decoration-none text-dark d-block">
                        <img src="assets/img/icons/cart.svg">
                        <div class="cairo">
                            لوم كارت    
                        </div>
                    </a>
                </span>
                
            </div>
        </div>
    </section>
    <!-- end menu mobile  -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center">

                <div class="col-lg-2 text-center py-2 icon-description-top-footer">
                    <h1>
                        <img src="assets/img/footer_icons/suport.jpg" draggable="false" loading="lazy">
                    </h1>
                    <h5 class="cairo">الدعم والمساعدة</h5>
                    <p class="cairo">
                        دعم ومساعدة على مدار الساعة لتجربة تسوق ممتعة كما يمكنك التواصل معنا من خلال صفحة المستخدم (الدعم والمساعدة)
                    </p>
                </div>

                <div class="col-lg-2 text-center py-2 icon-description-top-footer">
                    <h1>
                        <img src="assets/img/footer_icons/verfiy.jpg" draggable="false" loading="lazy">
                    </h1>
                    <h5 class="cairo">تسوق بكل ثقة</h5>
                    <p class="cairo">
                        تطبق لدينا سياسة حماية العميل لعملية شرائك بالكامل
                    </p>
                </div>

                <div class="col-lg-2 text-center py-2 icon-description-top-footer">
                    <h1>
                        <img src="assets/img/footer_icons/card.jpg" draggable="false" loading="lazy">
                    </h1>
                    <h5 class="cairo">الدفع الأمن</h5>
                    <p class="cairo">
                        نستخدم وسيلة الدفع الأكثر أمان لدينا
                    </p>
                </div>

                <div class="col-lg-2 text-center py-2 icon-description-top-footer">
                    <h1>
                        <img src="assets/img/footer_icons/turck.jpg" draggable="false" loading="lazy">
                    </h1>
                    <h5 class="cairo">الشحن السريع</h5>
                    <p class="cairo">
                         الشحن السريع لجميع عناوين العملاء عن طريق خدمات شركاء الشحن المتوفرين لدينا
                    </p>
                </div>

                <div class="col-lg-2 text-center py-2 icon-description-top-footer">
                    <h1>
                        <img src="assets/img/footer_icons/dolar.jpg" draggable="false" loading="lazy">
                    </h1>
                    <h5 class="cairo">قيمة رائعة</h5>
                    <p class="cairo">
                        نبذل جهدنا لتوفير افضل واقل الاسعار لدينا ويضمن ذلك البائعين لدينا
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Start Footer -->
    <footer>
        <div class="container mt-5 text-center justify-content-center">
            <div class="row">
                <!-- اول ايقونة وروابط سوشال ميديا -->
                <div class="col-lg-6 mt-4">
                    <h5 class="cairo">تابعنا على</h5>

                    <div class="py-1">
                        <a href="https://www.snapchat.com/add/loom_shope" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-snapchat fs-4 mt-2"></i>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="https://www.instagram.com/loomshope" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-instagram fs-4"></i>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="https://twitter.com/loomshope" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-twitter fs-4"></i>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="https://www.facebook.com/loomshope" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-facebook-f fs-4"></i>
                        </a>
                    </div>
                    
                    <div class="py-1">
                        <a href="https://www.tiktok.com/@loomshope" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-tiktok fs-4 mt-2"></i>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="https://www.linkedin.com/mwlite/in/%D9%84%D9%88%D9%85-loom-b2824a222" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-linkedin fs-4 mt-2"></i>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="https://www.youtube.com/channel/UCn6X9Imli-yANOEwtfGEpcQ" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-youtube fs-5 mt-2"></i>
                        </a>
                        &nbsp;
                        &nbsp;
                        <a href="https://www.pinterest.com/loomshope/" class="text-dark text-decoration-none tajawal" target="_blank">
                            <i class="fab fa-pinterest fs-4 mt-2"></i>
                        </a>
                    </div>

                </div>

                <!-- هنا ايقونة حمل تطبيق -->
                <div class="col-lg-6 mt-4">
                    <h5 class="cairo">حمل التطبيق</h5>
                    <div class="pt-1">
                        <a href="javascript:void;">
                            <img src="assets/img/footer/google.jpg" class="img-fluid icon-footer">
                        </a>
                        <a href="javascript:void;">
                            <img src="assets/img/footer/app-strore.jpg" class="img-fluid icon-footer">
                        </a>
                    </div>
                </div>


                </div>
                
            </div>
        </div>

        <div class="container-fluid">
            <!-- here row deperment -->
            <div class="row text-center justify-content-center py-3">
                <div class="col-lg-8 py-1 mt-4">
                    <a href="footer/terms_use.php" class="text-decoration-none text-secondary cairo text-mediam">
                        شروط الاستخدام
                    </a>
                    &nbsp; &nbsp;
                    <a href="footer/privcy_policy.php"" class="text-decoration-none text-secondary cairo text-mediam">
                        سياسة الخصوصية
                    </a>
                    &nbsp; &nbsp;
                    <a href="javascript:void;" class="text-decoration-none text-secondary cairo text-mediam">
                        سياسة الألغاء
                    </a>
                    &nbsp; &nbsp;
                    <a href="javascript:void;" class="text-decoration-none text-secondary cairo text-mediam">
                        سياسة الاسترجاع
                    </a>
                    &nbsp; &nbsp;
                    <a href="javascript:void;" class="text-decoration-none text-secondary cairo text-mediam">
                        سياسة الضمان
                    </a>
                    &nbsp; &nbsp;
                    <a href="javascript:void;" class="text-decoration-none text-secondary cairo text-mediam">
                        سياسة الشحن
                    </a>
                    &nbsp; &nbsp;
                    <a href="footer/works.php" class="text-decoration-none text-secondary cairo text-mediam">
                        التوظيف
                    </a>
                    
                </div>
                
                <div class="col-lg-4 py-2">
                    <img src="assets/img/footer/paymentnew.png" class="img-fluid">
                    <div class="mt-3">
                        <h6 class="text-secondary">شركة لوم المحدودة (شركة شخص واحد) السجل التجاري 4031247760</h6>
                    </div>
                </div>

            </div> 
            
            <div class="row">
                <!-- Copy right -->
                <h6 class="text-center py-2">&copy; جميع الحقوق محفوظة LOOM <span id="date"></span></h6>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    
</main>
    <!-- Start Script -->   
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/swiperslider.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/lazy.js"></script>
    <script src="assets/js/loader.js"></script>
    <!-- End Script -->
</body>

</html>

<?php $conn = null; ?>