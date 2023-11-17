<?php 

    if(!isset($_GET['id']) || empty($_GET['id'])){
        header("location: ../",true);
        exit;
    }else{
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }

    $pageName = "المتجر";
    require "../inc/asset/header.php";

    // check with id true or false
    $check = $conn->prepare("SELECT * FROM category WHERE id = :id");
    $check->bindParam("id",$id);
    $check->execute();
    if($check->rowCount() != 1){
        echo "<script>document.location = '../';</script>";
        exit;
    }


    $myheart = $conn->prepare("SELECT * FROM product WHERE category = :id ORDER BY iD DESC");
    $myheart->bindParam("id",$id);
    $myheart->execute();

    $merchant_product = $conn->prepare("SELECT * FROM `product_merchant` WHERE status_product = 'تم قبول' AND category = :id");
    $merchant_product->bindParam("id",$id);
    $merchant_product->execute();
    
    $categoris = $conn->query("SELECT * FROM category");

    
?>

    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">الفئات</h1>

                <ul class="list-unstyled">

                    <li class="pb-3">
                        <ul class="collapse show list-disc pl-3">
                        <?php foreach($categoris AS $ct_show): ?>
                            <li>
                                <a class="text-decoration-none text-dark" href="store.php?id=<?php echo $ct_show['id']; ?>"><?php echo $ct_show['Title']; ?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </li>

                <li>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="exampleInputSearch" class="form-label">البحث</label>
                            <input type="search" class="form-control" id="exampleInputSearch" name="search" palceholder="ابحث عن كلمات هنا ....." required>
                        </div>
                        <button type="submit" class="btn btn-dark cairo" name="btn">ألبحث</button>
                    </form>
                </li>

                </ul>

            </div>

        <?php 
            if(isset($_POST['btn'])){
            $data = filter_var($_POST['search'],FILTER_SANITIZE_STRING);
            if(!empty($data)){
                
            $searching = "%".$data."%";

            $search = $conn->prepare("SELECT * FROM product WHERE Title LIKE :search AND category = :id");
            $search->bindParam("search",$searching);
            $search->bindParam("id",$id);
            $search->execute();
            if($search->rowCount() == 0):
        ?>
            <div class="col-lg-9 text-center mt-5">
                <h1 class="cairo text-danger">لا يوجد نتائج البحث</h1>
            </div>
        <?php else: ?>

            <div class="col-lg-9">
                <div class="row justify-content-center">

                <?php 
                    foreach($search AS $show_a_p): 
                        $img_heart = '../'.$show_a_p['img_file'];
                ?> 
            <div class="col-md-4">
                <div class="card other mb-4">

                    <div class="card border-0">
                        <a href="view.php?id=<?php echo $show_a_p['ID']; ?>" class="text-decoration-none">
                            <img class="card-img rounded-0 img-fluid" src="<?php echo $img_heart; ?>" style="height: 280px;" alt="Loading" loading="lazy">
                        </a>
                    </div>

                    <div class="card-body">
                        <a href="view.php?id=<?php echo $show_a_p['ID']; ?>" class="h4 text-dark cairo text-decoration-none">
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
                            <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="btn btn-dark cairo btn-sm float-end text-samlling">
                                الاضافة الى لوم كارت
                            </a>
                            
                            <a href="favourites.php?fav==<?php echo $show_a_p['ID']; ?>" class="text-dark cairo text-decoration-none h2 float-start" title="الاضافة للفضلاتي">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body bg-dark text-center pt-1 pb-1">
                        <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="text-white text-decoration-none cairo dollar">
                            شراء الآن
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

                </div>

            </div>

        <?php 
            endif;
            }
                }else{
        ?>
            <div class="col-lg-9">
                <div class="row justify-content-center">

                <?php 
                    foreach($myheart AS $show_a_p): 
                        $img_heart = '../'.$show_a_p['img_file'];
                ?>
            <div class="col-md-4">
                <div class="card other mb-4">

                    <div class="card border-0">
                        <a href="view.php?id=<?= $show_a_p['ID']; ?>" class="text-decoration-none">
                            <img class="card-img rounded-0 img-fluid" src="<?= $img_heart; ?>" style="height: 280px;" alt="Loading" loading="lazy">
                        </a>
                    </div>

                    <div class="card-body">
                        <a href="view.php?id=<?php echo $show_a_p['ID']; ?>" class="h4 text-dark cairo text-decoration-none">
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
                            <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="btn btn-dark cairo btn-sm float-end text-samlling">
                                الاضافة الى لوم كارت
                            </a>
                            
                            <a href="favourites.php?fav==<?php echo $show_a_p['ID']; ?>" class="text-dark cairo text-decoration-none h2 float-start" title="الاضافة للفضلاتي">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body bg-dark text-center pt-1 pb-1">
                        <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="text-white text-decoration-none cairo dollar">
                            شراء الآن
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; 
                    foreach($merchant_product AS $show_a_p): 
                        $img_heart = '../'.$show_a_p['img_file'];
                ?>
            <div class="col-md-4">
                <div class="card other mb-4">

                    <div class="card border-0">
                        <a href="views.php?id=<?= $show_a_p['ID']; ?>" class="text-decoration-none">
                            <img class="card-img rounded-0 img-fluid" src="<?= $img_heart; ?>" style="height: 280px;" alt="Loading" loading="lazy">
                        </a>
                    </div>

                    <div class="card-body">
                        <a href="views.php?id=<?= $show_a_p['ID']; ?>" class="h4 text-dark cairo text-decoration-none">
                            <?= $show_a_p['title']; ?>
                        </a>
                        
                        <p class="cairo text-secondary"><?php echo $show_a_p['price']; ?> ر.س</p>

                        <div class="mt-1 mb-1">
                            <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="btn btn-dark cairo btn-sm float-end text-samlling">
                                الاضافة الى لوم كارت
                            </a>
                            
                            <a href="favourites.php?fav==<?php echo $show_a_p['ID']; ?>" class="text-dark cairo text-decoration-none h2 float-start" title="الاضافة للفضلاتي">
                                <i class="fa-regular fa-heart"></i>
                            </a>
                        </div>

                    </div>

                    <div class="card-body text-center bg-dark pt-1 pb-1">
                        <a href="add_cart.php?cart=<?php echo $show_a_p['ID']; ?>" class="text-white text-decoration-none cairo dollar">
                            شراء الآن
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

                </div>

            </div>
        <?php } ?>


        </div>
    </div>
    <!-- End Content -->

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