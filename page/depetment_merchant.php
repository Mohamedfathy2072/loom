<?php 
    $pageName = "نوع الكيان";
    require "../inc/asset/header.php";

?>

<section class="py-5">
    <div class="container">
        <div class="row text-center">
                <h2 class="cairo mb-4">نوع الكيان</h2>
      

            <div class="col-lg-4">    
                <a href="signup_merchant.php?dep=1" class="text-dark text-decoration-none">
                    <div class="shadow rounded py-5 d-flex">
                        <div class="text-end me-3">
                            <h4 class="cairo mb-0">فرد</h4>
                            <p class="cairo mt-0 text-secondary">وثيقة عمل حر</p>
                        </div>
                        <div class="text-start ms-3 me-auto">
                            <div class="fs-1"><i class='bx bx-user'></i></div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-4">
                <a href="signup_merchant.php?dep=2" class="text-dark text-decoration-none">
                    <div class="shadow rounded py-5 d-flex">
                        <div class="text-end me-3">
                            <h4 class="cairo mb-0">مؤسسة</h4>
                            <p class="cairo mt-0 text-secondary">سجل تجاري</p>
                        </div>
                        <div class="text-start ms-3 me-auto">
                            <div class="fs-1"><i class='bx bxs-bank'></i></div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="signup_merchant.php?dep=3" class="text-dark text-decoration-none">
                    <div class="shadow rounded py-5 d-flex">
                        <div class="text-end me-3">
                            <h4 class="cairo mb-0">شركة</h4>
                            <p class="cairo mt-0 text-secondary">سجل تجاري</p>
                        </div>
                        <div class="text-start ms-3 me-auto">
                            <div class="fs-1"><i class='bx bxs-building'></i></div>
                        </div>
                    </div>
                </a>
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