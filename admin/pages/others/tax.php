<?php
      // here require menu or navbar right
      $pageName = "لوحة تحكم لوم";
      require "../inc/menu_folder.php";
     // here include db connect
     require "../../../inc/config/db.php";

    //  Show commission in input
    $commission = $conn->query("SELECT * FROM commission WHERE id = 2");
    $commission = $commission->fetchObject();

    // update commission with database

    if(isset($_POST['btn'])):
        $number = filter_var($_POST['number'],FILTER_SANITIZE_NUMBER_INT);
        $update = $conn->prepare("UPDATE commission SET number = :number WHERE id = 2");
        $update->bindParam("number",$number);
        if($update->execute()):
            echo "<script>document.location = '../index.php';</script>";
        endif;
    endif;
?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
         <!-- Content -->

         <div class="container-xxl flex-grow-1 container-p-y">

           <!-- start form add product here -->
           <div class="row">
               <div class="col-xxl">
                   <div class="card mb-4">
                     <div class="card-header d-flex align-items-center justify-content-between">
                       <h5 class="mb-0">الضريبة</h5>
                     </div>
                     <div class="card-body">
                       <form method="POST">

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الضريبة الموقع</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" placeholder="هنا اكتب الضريبة الموقع" value="<?php echo $commission->number; ?> ر.س" name="number">
                           </div>
                         </div>
                    

                         <div class="row justify-content-end">
                           <div class="col-sm-10">
                             <button type="submit" class="btn btn-warning text-dark" name="btn">تعديل الضريبة</button>
                           </div>
                         </div>

                       </form>
                     </div>
                   </div>
                 </div>
           </div>
           <!-- end form add product -->
         </div>
         <!-- / Content -->   

    <?php require "../inc/footer_folder.php"; ?>