<?php 
    $pageName = "لوم باي";
    require "../inc/asset/header.php";

?>

<section class="container-fluid py-5">

    <div class="row">
        <div class="col-lg-12">
            <img src="../assets/img/pay.png" class="img-fluid me-5">
        </div>
    </div>

    <div class="row justify-content-center">
        <h2 class="py-3 text-center cairo">البطاقات المحفوظة</h2>

            <div class="col-lg-6 text-center mt-5 mb-5">
                <img src="../assets/img/icons/wallet.svg" class="img-fluid w-25">

                <div class="cairo mt-4 fw-bold fs-4">لا توجد بطاقات محفوظة</div>
                <div class="cairo mt-2 fs-6 text-secondary">البطاقات المحفوظة أثناء إنهاء عملية الشراء ستظهر هنا. نحن نستخدم طرق مشفّرة لحفظ تفاصيل بطاقاتك بطريقة آمنة</div>
                
                <a href="javascript:void(0);" class="mt-4 cairo btn btn-dark">اضافة بطاقة جديدة</a>
            </div>
                         
    </div>
</section>



<section class="mt-3 container">
    
    <div class="row">
        <div class="col-lg-12 bg-white shadow-lg pt-3 mb-5 mt-5 bg-body rounded-3">
            <div>
                <div class="d-flex">
                    <p class="text-dark cairo "><img src="../assets/img/pay.png"></p>
                    <p class="cairo text-secondary fs-1 me-auto">**0234</p>
                </div>

                <div class="mt-3 text-secondary fs-1 cairo text-center">
                    Visa Card
                </div>

                <div class="d-flex align-items-start justify-content-end py-3">

                    <a href="#" class="btn btn-danger btn-sm cairo rounded-pill me-2 ms-2 pe-3 ps-3 font-08rem">
                        حذف
                    </a>

                </div>

            </div>
        </div>
    </div>
</section>

<?php require "../inc/asset/footer.php"; ?>

<!-- Start Script -->
<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/templatemo.js"></script>
<script src="../assets/js/fontawesome.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- End Script -->
</body>

</html>