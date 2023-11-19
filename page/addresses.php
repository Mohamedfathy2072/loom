<?php 
    $pageName = "العناوين";
    require "../inc/asset/header.php";

?>



<section class="py-5">


    <div class="modal fade" id="AddAdress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align:justify ">
                    <div class="row " >
                        <div class="col col-12" >
                            <label for="" class="form-label">الاسم</label>
                            <input type="text" value="" placeholder="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="button" class="btn btn-primary">حفظ</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">

    <!-- here row title and button -->
        <div class="row mb-3">

            <h2 class="pt-3 mb-0 fw-bold text-end cairo"><?= $pageName; ?></h2>
            
            <div class="mb-4 cairo text-secondary mt-1" style="font-size: 0.8rem !important;">
                إدارة عناوينك الافتراضية لعملية الشراء
            </div>

            <div class="col-lg-2">
                <button type="button" class="cairo btn btn-dark fs-6" data-toggle="modal" data-target="#AddAdress">اضافة عنوان جديد</button>
            </div>

        </div>
    <!-- end row -->

        <!-- here row info address -->
        <div class="row">


            <!-- here start addresse boxs -->
            <div class="col-lg-12 bg-white shadow-lg pt-3 mb-5 mt-5 bg-body rounded">
                <div class="">

                    <div class="d-flex">
                        <p class="text-secondary cairo w-100px">الاسم : </p>
                        <p class="cairo">الاسم تجريبي</p>
                    </div>

                    <div class="d-flex">
                        <p class="text-secondary cairo w-100px">العنوان : </p>
                        <p class="cairo fw-bold"> 
                            شقة 4, 7979 - العبدرية - الملك فهد - امارة منطقة الرياض - منطقة الرياض - 12273 
                            <br> 
                            <span class="cairo fw-normal">الرياض, المملكة العربية السعودية</span>
                        </p>
                    </div>

                    <div class="d-flex">
                        <p class="text-secondary cairo w-100px">الهاتف : </p>
                        <p class="cairo" dir="ltr">      
                            +966-51-4534556
                        </p>
                    </div>

                    <div class="d-flex align-items-end py-3">

                        <a href="#" class="btn btn-warning btn-sm cairo rounded-pill me-2 ms-2 pe-3 ps-3 font-08rem">
                            تعديل
                        </a>

                        <a href="#" class="btn btn-danger btn-sm cairo rounded-pill me-2 ms-2 pe-3 ps-3 font-08rem">
                            حذف
                        </a>

                        <div class="form-check form-switch me-auto mt-3 justify-content-end">
                            <label class="form-check-label cairo fs-6 ms-2" for="flexSwitchCheckDefault">العنوان الافتراضي</label>
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                        </div>

                    </div>

                </div>
            </div>
            <!-- here end address boxs -->

            

            <!-- here start addresse boxs -->
            <div class="col-lg-12 bg-white shadow-lg pt-3 mb-5 mt-5 bg-body rounded">
                <div class="">

                    <div class="d-flex">
                        <p class="text-secondary cairo w-100px">الاسم : </p>
                        <p class="cairo">الاسم تجريبي</p>
                    </div>

                    <div class="d-flex">
                        <p class="text-secondary cairo w-100px">العنوان : </p>
                        <p class="cairo fw-bold"> 
                            شقة 4, 7979 - العبدرية - الملك فهد - امارة منطقة الرياض - منطقة الرياض - 12273 
                            <br> 
                            <span class="cairo fw-normal">الرياض, المملكة العربية السعودية</span>
                        </p>
                    </div>

                    <div class="d-flex">
                        <p class="text-secondary cairo w-100px">الهاتف : </p>
                        <p class="cairo" dir="ltr">      
                            +966-51-4534556
                        </p>
                    </div>

                    <div class="d-flex align-items-end py-3">

                        <a href="#" class="btn btn-warning btn-sm cairo rounded-pill me-2 ms-2 pe-3 ps-3 font-08rem">
                            تعديل
                        </a>

                        <a href="#" class="btn btn-danger btn-sm cairo rounded-pill me-2 ms-2 pe-3 ps-3 font-08rem">
                            حذف
                        </a>

                        <div class="form-check form-switch me-auto mt-3 justify-content-end">
                            <label class="form-check-label cairo fs-6 ms-2" for="flexSwitchCheckDefault">العنوان الافتراضي</label>
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" disabled>
                        </div>

                    </div>

                </div>
            </div>
            <!-- here end address boxs -->

            
        </div>
        <!-- end row -->

    </div>
</section>



<?php require "../inc/asset/footer.php"; ?>

<!-- Start Script -->
<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../login/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/templatemo.js"></script>
<script src="../assets/js/fontawesome.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- End Script -->
</body>

</html>
