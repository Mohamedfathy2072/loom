<?php 

    if(!isset($_GET['id']) || empty($_GET['id'])){
        header("location: ../",true);
        exit;
    }else{
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }

    $pageName = "المنتج";
    require "../inc/asset/header.php";

    $info = $conn->prepare("SELECT * FROM product WHERE ID = :id");
    $info->bindParam("id",$id);
    $info->execute();
    if($info->rowCount() != 1){
        echo "<script>document.location = '../';</script>";
        exit;
    }else{
        $info_show = $info->fetch(PDO::FETCH_ASSOC);

        $size = explode(",",$info_show['size']);

        $first_img = $info_show['img_file'];
        
        $images = $conn->prepare("SELECT * FROM img_product WHERE product_id = :id");
        $images->bindParam("id",$id);
        $images->execute();

        $category = $conn->prepare("SELECT * FROM category WHERE id = :id");
        $category->bindParam("id",$info_show['category']);
        $category->execute();

        $deperment = $category->fetchObject();

        if(!empty($info_show['price_coupon'])){
            $price_coupun = $info_show['price_coupon'];
        }
    }
    
?>


    <!-- Open Content -->
    <section>
        <div class="container-fluid pb-5">

            <div class="row">
    
                <!-- here title top -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb mx-4 mt-3">
                        <li class="breadcrumb-item"></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#" class="text-dark title-price cairo text-decoration-none title-top-page-secondary">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <a href="#" class="text-dark title-price cairo text-decoration-none title-top-page-secondary">
                                <?= $deperment->Title; ?>
                            </a>
                        </li>
                        <li aria-current="page">
                            <a href="#" class="title-price cairo text-decoration-none title-top-page-secondary">
                                <?= $info_show['title']; ?>
                            </a>
                        </li>
                    </ol>
                </nav>
                <!-- end top title -->

                <div class="col-lg-4 mt-2">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="../<?= $first_img; ?>" alt="product" id="product-detail">
                    </div>
                    <div class="row">

                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-12 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--Second slide-->
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-3">
                                            <a href="javascript:void(0);">
                                                <img class="card-img img-fluid" src="../<?= $first_img; ?>" style="height: 70px;margin: 1.5rem 0;" alt="Product">
                                            </a>
                                        </div>
                                        
                                    <?php foreach($images AS $show): ?>
                                        <div class="col-3">
                                            <a href="javascript:void(0);">
                                                <img class="card-img img-fluid" src="<?= $show['file_src']; ?>" style="height: 70px;margin: 1.5rem 0;" alt="Product">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                                    </div>
                                </div>
                                <!--/.Second slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--End Controls-->
                    </div>
                </div>

                <!-- col end -->
                <div class="col-lg-5 mt-2">
                    <div class="card border-0 shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">

                            <h6 class="text-secondary cairo">
                                <?= $deperment->Title; ?>
                            </h6>

                            <h5 class="cairo">
                                <?= $info_show['title']; ?>
                            </h5>

                        <!-- model number -->
                            <div class="mb-2 mt-4 d-flex">
                                <div class="cairo text-samlling text-secondary"> رقم الموديل : </div>
                                <div class=" text-secondary ms-2 me-2 cairo text-samlling">
                                     <?= $info_show['generate_code']; ?> |
                                </div>
                                
                                

                                <div style="margin-top:-4px;">

                                    <span title="4.5" class="text-white rounded-pill ms-3 pe-1 ps-1" style="font-size:0.7rem;background-color: #18d701;">
                                        4.5 <i class="fas fa-star text-white" style="font-size:0.5rem;"></i>
                                    </span> 

                                    <span class="text-samlling text-secondary cairo border-bottom border-secondary">
                                        2950 تقييمات
                                    </span>

                                </div>

                            </div>
                        <!-- end model number -->

                            <?php 
                                // if isset coupon
                                if(isset($price_coupun)){
                            ?>

                                <!-- here prices -->
                                <div class="pb-2">
                                    <span class="cairo title-price">قبل:</span>
                                    <span class="h6 mb-3 text-samlling cairo text-secondary me-5 text-decoration-line-through">
                                        <?= $info_show['price']; ?> ر.س 
                                    </span>
                                </div>

                                <div class="py-2 d-flex">
                                    <span class="cairo title-price mt-3">الان:</span>
                                    <div class="me-5">
                                        <span class="h5 py-2 cairo fw-bold">
                                            <?= $price_coupun; ?> ر.س.
                                        </span>
                                        <div class="cairo text-secondary title-price">شامل ضريبة القيمة المضافة</div>
                                    </div>
                                </div>

                            <?php }else{ ?>

                                <span class="cairo title-price mt-3">السعر :</span>
                                <span class="py-2 ms-3 cairo fw-bold">
                                    <?= $info_show['price']; ?> ر.س
                                </span>

                            <?php } 
                            //end price coupon
                                ?>

                                <!-- here coupon price -->
                            <div class="coupon-text">
                                <span class="cairo">جاري الحفظ: </span>
                                <span class="cairo fw-bold"> 1.90 ر.س. &nbsp; <span class="cairo">خصم %34 </span> </span>
                            </div>

                            <!-- هنا مستطيل القسط -->
                            <div class="mt-3 d-flex qst-logo-text">
                                <div>
                                    <img src="../assets/img/icons/stc.png" style="width: 35px;">
                                </div>

                                <div class="titl-price cairo title-price">
                                        قام بالدفع عن طريق stc pay وفوائدة يكون بقيمة 22.00 ر.س
                                     <a href="#" class="cairo title-price">اعرف المزيد</a>
                                </div>
                            </div>

                            <!-- here delivery days -->
                            <form method="POST">
                               
                                <div class="row pb-3 mt-5">

                                    <div class="col-2">
                                        <select id="defaultSelect" class="form-select">
                                            <?php for($i=1;$i <= 10;$i++): ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <div class="col-8 d-grid">
                                        <a href="add_cart.php?cart=<?= $id; ?>" class="btn btn-dark cairo fs-6 py-2">الاضافة الى لوم كارت</a>
                                    </div>

                                    <div class="col-2 mt-1">
                                        <a href="favourites.php?fav=<?= $id; ?>">
                                            <span class="p-2 rounded-circle" style="background-color:#F2F2F5">
                                                <i class='bx bxs-heart text-secondary fs-5 p-1'></i>
                                            </span>
                                        </a>
                                    </div>

                                </div>

                            </form>

                           

                        </div>
                    </div>
                </div>

                <!-- here left list -->
                <div class="col-lg-3 mt-2">
                    <div class="card border-0 shadow py-1 mb-5 bg-body rounded">
                        <div class="card-body p-0 pb-3">
                            <!-- here first line  -->
                            <div class="d-flex table-left-lists">
                                
                                <img src="https://f.nooncdn.com/s/app/com/noon/icons/free_returns.svg" alt="free_returns" class="sc-b51db3f-1 ecQrZu free_returns" width="24px" height="24px">
                                <div class="title-price me-3">
                                    <span class="cairo"><?= $info_show['rt_product']; ?>.</span>
                                    <div class="d-inline-block">
                                        <div>
                                            <p class="m-0">
                                                <a href="#" class="text-primary cairo title-price text-decoration-none border-bottom border-primary title-price">
                                                    اعرف المزيد
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- end first line -->

                            <!-- here second left line -->
                            <div class="d-flex table-left-lists mt-2">
                                <img src="https://f.nooncdn.com/s/app/com/noon/icons/warranty.svg" alt="free_returns" class="sc-b51db3f-1 ecQrZu free_returns" width="24px" height="24px">
                                <div class="title-price me-3">
                                    <span class="cairo"><?= $info_show['grenti']; ?></span>
                                </div>
                            </div>

                            <!-- end second left line -->

                            <!-- here other left line -->
                            <div class="d-flex table-left-lists mt-2">
                                <img src="https://f.nooncdn.com/s/app/com/noon/icons/warranty.svg" alt="free_returns" class="sc-b51db3f-1 ecQrZu free_returns" width="24px" height="24px">
                                <div class="title-price me-3">
                                    <span class="cairo">مدة التجهيز للشحن خلال 10 ايام</span>
                                </div>
                            </div>

                            <!-- end other left line -->
                            

                            <!-- here three line -->
                            <div class="d-flex table-left-lists mt-2">
                                <img src="../assets/img/icon.png" alt="free_returns" class="sc-b51db3f-1 ecQrZu free_returns" width="48px" height="48px">
                                <div class="title-price me-3">
                                    <span class="cairo title-price">
                                        يتم البيع عبر 
                                        <a href="#" class="cairo fw-bold title-price text-decoration-none border-bottom border-dark text-dark">لوم</a>
                                    </span>

                                    <div>
                                        <p class="m-0">
                                            <a href="#" class="text-secondary cairo title-price text-decoration-none title-price">
                                                تقييم إيجابي للبائع <span>99%</span> 
                                                <span title="4.5" class="text-white rounded-pill ms-3 pe-1 ps-1" style="font-size:0.7rem;background-color: #18d701;">
                                                    4.9 <i class="fas fa-star text-white" style="font-size:0.5rem;" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <!-- end three line -->

                            <!-- here for line -->
                            <div class="d-flex table-left-lists border-0 mt-3">
                                
                                <img src="../assets/img/footer_icons/verfiy.jpg" alt="free_returns" width="42px" height="35px">
                                <div class="title-price me-2">
                                    <span class="cairo title-left-line-11">تسوق بكل ثقة. 
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>

                                    <div class="d-inline-block">
                                        <div>
                                            <p class="m-0">
                                                <a href="#" class="text-secondary cairo title-price text-decoration-none title-price">
                                                    تطبق لدينا سياسة حماية العميل لعملية شرائك بالكامل
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <!-- end for line -->

                            <!-- here five line -->
                            <div class="d-flex table-left-lists border-0 mt-3">
                                
                                <img src="../assets/img/footer_icons/card.jpg" alt="free_returns" width="42px" height="35px">
                                <div class="title-price me-2">
                                    <span class="cairo title-left-line-11">الدفع الأمن. 
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>

                                    <div class="d-inline-block">
                                        <div>
                                            <p class="m-0">
                                                <a href="#" class="text-secondary cairo title-price text-decoration-none title-price">  
                                                    نستخدم وسيلة الدفع الأكثر أمان لدينا
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <!-- end five line -->

                            <!-- here five line -->
                            <div class="d-flex table-left-lists border-0 mt-3">
                                
                                <img src="../assets/img/footer_icons/turck.jpg" class="mb-3" alt="free_returns" width="45px" height="35px">
                                <div class="title-price me-2">
                                    <span class="cairo title-left-line-11">شحن سريع. 
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>

                                    <div class="d-inline-block">
                                        <div>
                                            <p class="m-0">
                                                <a href="#" class="text-secondary cairo title-price text-decoration-none title-price">
                                                    الشحن السريع لجميع عناوين العملاء عن طريق خدمات شركاء الشحن المتوفرين لدينا
                                                </a>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            <!-- end five line -->


                        </div>
                    </div>
                </div>

                <!-- here descriptions -->
                <div class="col-lg-12 mt-5 shadow py-5 px-3 rounded">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item ms-3 m-465-0" role="presentation">
                        <button class="nav-link active cairo btn-tabs" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">نظرة عامة</button>
                    </li>
                    <li class="nav-item ms-3 m-465-0" role="presentation">
                        <button class="nav-link cairo btn-tabs" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">المواصفات</button>
                    </li>
                    <li class="nav-item ms-3 m-465-0" role="presentation">
                        <button class="nav-link cairo btn-tabs" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">التقيمات</button>
                    </li>
                </ul>
                <!-- here content -->
                <div class="tab-content mt-5" id="myTabContent">
                    <!-- start first -->
                    <div class="tab-pane cairo w-75 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <?= $info_show['description']; ?>
                    </div>
                    <!-- here end first -->
                    <!-- here second -->
                    <div class="tab-pane cairo fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- here table -->
                    <div class="d-sm-flex">
                        <div class="mx-2 all-table">
                            <table class="table shadow rounded w-100">
                                <tbody>
                                <tr>
                                    <td>Wireless Charging</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Compatibility</td>
                                    <td>All Devices</td>
                                </tr>
                                <tr>
                                    <td>Connector type</td>
                                    <td>Assorted (Cable Dependent)</td>
                                </tr>
                                <tr>
                                    <td>Connection Type</td>
                                    <td>USB and Type C</td>
                                </tr>
                                <tr>
                                    <td>حجم البطارية</td>
                                    <td>30000 مللي أمبير / ساعة</td>
                                </tr>
                                <tr>
                                    <td>اسم اللون</td>
                                    <td>أسود</td>
                                </tr>
                                <tr>
                                    <td>الميزة 1</td>
                                    <td>شخصي</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>  
                          <!-- end tablse -->
                        
                        <!-- here test table -->
                        <div class="mx-2 all-table">
                            <table class="table shadow rounded w-100">
                                <tbody>
                                <tr>
                                    <td>Wireless Charging</td>
                                    <td>No</td>
                                </tr>
                                <tr>
                                    <td>Compatibility</td>
                                    <td>All Devices</td>
                                </tr>
                                <tr>
                                    <td>Connector type</td>
                                    <td>Assorted (Cable Dependent)</td>
                                </tr>
                                <tr>
                                    <td>Connection Type</td>
                                    <td>USB and Type C</td>
                                </tr>
                                <tr>
                                    <td>حجم البطارية</td>
                                    <td>30000 مللي أمبير / ساعة</td>
                                </tr>
                                <tr>
                                    <td>اسم اللون</td>
                                    <td>أسود</td>
                                </tr>
                                <tr>
                                    <td>الميزة 1</td>
                                    <td>شخصي</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- end test table -->

                    </div>
                    <!-- end table -->
                    
                    </div>
                    <!-- end second -->
                    <!-- here comments and ratings -->
                    <div class="tab-pane cairo fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">..ffddddf.</div>
                    <!-- end comments and ratings -->
                </div>
                <!-- end content -->
                </div>
                <!-- end descriptions -->

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
    <!-- End Script -->

</body>

</html>