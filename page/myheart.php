<?php 
    $pageName = "المفضلة";
    require "../inc/asset/header.php";

    if(empty($_SESSION['id']) || !isset($_SESSION['id'])){
        echo "<script>document.location = '../login/login3.php';</script>";
        exit;
    }
    
    $myheart = $conn->prepare("SELECT * FROM favourites INNER JOIN product ON favourites.product_id_fv = product.ID WHERE favourites.member_id = :member");
    $myheart->bindParam("member",$_SESSION['id']);
    $myheart->execute();

?>
    
<section class="container-fluid py-5">
    <div class="row justify-content-center">
        <h2 class="py-3 text-center cairo">المفضلة</h2>

        <?php if($myheart->rowCount() == 0): ?>
            <div class="col-lg-6 text-center mt-5">
                <img src="../assets/img/icons/heart.svg" class="img-fluid w-25">

                <div class="cairo mt-4 fw-bold">قائمتك المفضلة خالية! أضف هنا كل ما تحب وتتمنى</div>
                <div class="cairo mt-2 fs-6 text-secondary">لا تنتظر أكثر من كذا</div>
                
                <a href="../" class="btn btn-dark mt-3 fs-6 cairo">ابدأ التسوّق</a>
            </div>
        <?php endif; ?>
         <?php 
            foreach($myheart AS $show_a_p): 
                $img_heart = '../'.$show_a_p['img_file'];
            ?>
            <div class="col-md-3">
                <div class="card other mb-4">

                    <div class="card border-0">
                        <a href="view.php?id=<?php echo $show_a_p['ID']; ?>" class="text-decoration-none">
                            <img class="card-img rounded-0 img-fluid" src="<?php echo $img_heart; ?>" style="height: 280px;" alt="Loading" loading="lazy">
                        </a>
                    </div>

                    <div class="card-body">
                        <a href="view.php?id=<?php echo $show_a_p['ID']; ?>" class="h4 text-dark tajawal text-decoration-none">
                            <?php echo $show_a_p['title']; ?>
                        </a>
                        
                        <p class="cairo text-secondary"><?php echo $show_a_p['price']; ?> ر.س</p>

                        <div class="mt-1 mb-1">
                            <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="btn btn-warning cairo btn-sm float-end">
                                إضافة إلى لوم كارت
                            </a>
                            
                            <a href="trash/delete_fav.php?id=<?php echo $show_a_p['iD']; ?>" class="text-danger cairo text-decoration-none h2 float-start" title="الاضافة للفضلاتي">
                                <i class="fa-solid fa-heart"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body bg-dark pt-1 pb-1">
                        <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="text-white text-decoration-none cairo dollar">
                            <span class="text-warning">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span>
                            اشتر الان
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        
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