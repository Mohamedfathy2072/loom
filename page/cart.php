<?php 
    $pageName = "لوم كارت";
    require "../inc/asset/header.php";

    if(!isset($_SESSION['id']) || empty($_SESSION['id'])){
        echo "<script>document.location = '../login/login3.php';</script>";
        exit;
    }

    $product = $conn->prepare("SELECT * FROM cart INNER JOIN product ON cart.id_product_card = product.ID WHERE cart.member_id = :member");
    $product->bindParam("member",$_SESSION['id']);
    $product->execute();


    $product_data = $conn->prepare("SELECT * FROM cart INNER JOIN product ON cart.id_product_card = product.ID WHERE cart.member_id = :member");
    $product_data->bindParam("member",$_SESSION['id']);
    $product_data->execute();

    $datas = $conn->prepare("SELECT SUM(price) FROM cart INNER JOIN product ON cart.id_product_card = product.ID WHERE cart.member_id = :member");
    $datas->bindParam("member",$_SESSION['id']);
    $datas->execute();

    $all = $datas->fetch(PDO::FETCH_ASSOC);

    $num_products_count = $product_data->rowCount();
?>


 <!-- here loader -->
    <div class="center" id="loader-load">
        <div class="ring"></div>
        <img src="../assets/img/icons/loomcart.svg" class="loader">
    </div>
    <!-- end loader -->

    <!-- Open Content -->
    <section class="mb-5 pb-5">
        <div class="container-fluid pb-5">
            <div class="row mt-4">

                <div class="col-lg-8">
                    <img src="../assets/img/cart.svg" class="img-fluid position-absolute top-logo-pages">
                </div>

                <?php 
                    foreach($product AS $shows_product): 
                        $show_img = '../'.$shows_product['img_file'];
                    ?>
                <div class="col-lg-8 shadow rounded my-5 box-product-cart">
                    <div class="py-3 d-flex d-mobile-block">


                        <div class="ms-3 mobile-2">
                            <img src="<?= $show_img; ?>" class="product-img-cart">
                        </div>

                        <div class="mb-4 mobile-3">
                            <h6 class="cairo text-secondary text-samlling fs-12px">الاسم التصنيف</h6>
                            <h6 class="cairo text-dark fs-14px"><?= $shows_product['title'] ?></h6>
                            <h6 class="cairo text-secondary text-samlling fs-12px">اطلب في غضون 17 ساعة 0 دقيقة</h6>
                            <h6 class="cairo text-dark title-09rem fs-12px">
                                يتم البيع عبر 
                                <span class="cairo fw-bold">loomshop</span>
                            </h6>
                            <h6 class="cairo text-dark title-09rem fs-12px">
                                <img src="https://f.nooncdn.com/s/app/com/noon/icons/free_returns.svg" alt="free_returns" width="24px" height="24px">
                                <span class="text-samlling fs-12px cairo text-secondary"><?= $shows_product['rt_product']; ?></span>
                            </h6>
                            <h6 class="cairo text-dark title-09rem fs-12px">
                                <img src="https://f.nooncdn.com/s/app/com/noon/icons/warranty.svg" alt="free_returns" width="24px" height="24px">
                                <span class="text-samlling fs-12px cairo text-secondary"><?= $shows_product['grenti']; ?></span>
                            </h6>

                            <div class="mt-3 mb-0">
                                <a href="favourites.php?fav=<?= $shows_product['iD']; ?>" class="fs-12px text-secondary text-decoration-none">
                                    <i class="bx bx-heart"></i>
                                    <span class="text-samlling fs-12px cairo">إضافة إلى المفضلة</span>
                                </a>
                                <a href="trash/delete.php?id=<?= $shows_product['iD']; ?>" class="fs-12px text-secondary text-decoration-none me-5">
                                    <i class="bx bx-trash text-danger"></i>
                                    <span class="text-samlling cairo">حذف من لوم كارت</span>
                                </a>
                            </div>
                        </div>

                    
                        <div class="me-auto text-end mobile-4 fs-14px">
                            <?= $shows_product['price'] ?> ر.س
                        </div>

                    </div>
                
                </div>
            
            <?php endforeach; ?>

                
                <div class="col-lg-4">
                    <div class="m-2 px-4 py-2 order-info">
                        <h5 class="cairo fw-bold">ملخص الطلب</h5>
                        

                        <div>
                            
                            <form class="d-flex mt-3" method="POST">
                                <input type="text" class="form-control py-1" placeholder="ادخل كود الخصم" style="border-top-left-radius:0;border-bottom-left-radius:0;">
                                <button class="btn btn-dark cairo" style="border-top-right-radius:0;border-bottom-right-radius:0;">تطبيق</button>
                            </form>

                            <div class="d-flex mt-3">
                                <div class="ms-auto title-09rem text-secondary cairo">
                                    المجموع الفرعي 
                                    (<?= $num_products_count ?> <?php if($num_products_count > 1){echo "منتجات"; }else{ echo "منتج"; } ?>)
                                </div>
                                <div class="me-auto title-09rem text-secondary cairo">71.00 ر.س.</div>
                            </div>

                            <div class="d-flex mt-3 border-bottom border-secondary pb-3">
                                <div class="ms-auto title-09rem text-secondary cairo">
                                    الشحن
                                    <a href="#" class="cairo fw-bold title-09rem text-decoration-none">التفاصيل</a>
                                </div>
                                <div class="me-auto title-09rem text-secondary cairo"><?= $all['SUM(price)']; ?>.00 ر.س.</div>
                            </div>
                            
                            <div class="d-flex mt-3">
                                <div class="ms-auto title-09rem cairo text-secondary">
                                    <span class="fw-bold cairo text-dark fs-6">المجموع</span>
                                    (شامل ضريبة القيمة المضافة)
                                </div>
                                <div class="me-auto title-09rem text-secondary cairo"><?= $all['SUM(price)']; ?>.00 ر.س </div>
                            </div>
                        </div>

                        <div class="w-100 mt-5">
                            <img src="../assets/img/footer/paymentnew.png" class="img-fluid">
                        </div>

                        <div class="my-3">
                            <a href="#" class="btn btn-dark cairo w-100">صفحة الدفع</a>
                        </div>

                    </div>
                </div>

               
            </div>
        </div>
    </section>
    <!-- Close Content -->

    <?php require "../inc/asset/footer.php"; ?>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script src="../assets/js/swiper.js"></script>
    <script src="../assets/js/swiperslider.js"></script>
    <script src="../assets/js/fontawesome.js"></script>
    <script src="../assets/styleLibary/boxicons/dist/boxicons.js"></script>
    <script src="../assets/js/loader.js"></script>
    <!-- End Script -->

</body>

</html>