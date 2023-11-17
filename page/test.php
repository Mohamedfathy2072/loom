<?php
    // here header page
    $pageName = "سلة السويق";
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

    if($product_data->rowCount() == 0){
        echo "<div class='py-5 mt-5 mb-5 text-center justify-content-center'>
                <h1 class='text-center mb-3'>عربة التسويق فارغة</h1>
                <img src='../assets/img/logo.png' class='img-fluid'>
                <a href='../' class='btn btn-dark btn-sm d-block' style='width: 9rem;border-radius: 20px;margin: auto;'>اذهب الي المتجر</a>
            </div>";
    }else{
?>
    

    <section class="py-5">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <div class="col"><h4><b>عربة التسويق</b></h4></div>
                            </div>
                        </div>

                    <?php foreach($product AS $shows_product): 
                            $show_img = '../'.$shows_product['img_file'];
                        ?>
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">

                                <div class="col-2">
                                    <img class="img-fluid" src="<?= $show_img; ?>">
                                </div>

                                <div class="col">
                                    <div class="row text-muted"><?= $shows_product['title'] ?></div>
                                    <div class="row"><?= $shows_product['size'] ?></div>
                                </div>
                                <div class="col">
                                    عدد 1
                                </div>
                                <div class="col"><?= $shows_product['price'] ?> ر.س

                                    <a href="trash/delete.php?id=<?= $shows_product['iD']; ?>" class="text-decoration-none text-danger">
                                        <span class="close">
                                            <span class="close">
                                                <i class="fa-solid fa-trash fs-6"></i>
                                            </span>
                                        </span>
                                    </a>

                                </div>
                            </div>
                        </div>
                      
                    <?php endforeach; ?>

                        <div class="back-to-shop"><a href="../">&leftarrow;</a><span class="text-muted">رجوع الي متجر</span></div>
                    </div>

                    <div class="col-md-4 summary bg-light">
                        <div><h5><b>الاجمالي سلة</b></h5></div>
                        <hr>

                    <?php foreach($product_data AS $data): ?>
                        <div class="row" style="border-bottom: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col" style="padding-left:0;"><?php echo $data['title']; ?></div>
                            <div class="col text-right"><?php echo $data['price']; ?> ر.س </div>
                        </div>
                    <?php endforeach; ?>

                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">الاجمالي</div>
                            <div class="col text-right"><?= $all['SUM(price)']; ?> ر.س </div>
                        </div>

                        <button class="btn">اتمام الشراء</button>
                    </div>

                </div>
                
            </div>
            </div>
    </section>
    <!-- Close Banner -->


    <?php 
        }
        // here include footer
        require_once "../inc/asset/footer.php";
    ?>

    <!-- Start Script -->
    <script src="../assets/js/jquery-1.11.0.min.js"></script>
    <script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/fontawesome.js"></script>
    <script src="../assets/js/templatemo.js"></script>
    <script src="../assets/js/custom.js"></script>   
    <!-- End Script -->
</body>

</html>
