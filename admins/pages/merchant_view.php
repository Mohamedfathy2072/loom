<?php
        // check get id
        if(empty($_GET['id']) or !isset($_GET['id'])){
            header("location: merchant.php",true);
            exit;
        }else{
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        }

      // here require menu or navbar right
      $pageName = "نظام بائعين";
      require "inc/menu.php";
     // here include db connect
     require "../../inc/config/db.php";

     // هنا نحقق هل هذا اي دي موجود ام لا
     $check_id = $conn->prepare("SELECT * FROM signup_merchant INNER JOIN member ON signup_merchant.id_user = member.id WHERE signup_merchant.ID = :id");
     $check_id->bindParam("id",$id);
     $check_id->execute();
     // تحقق من اي دي سطر واحد موجود او اكثر
     if($check_id->rowCount() != 1){
       echo "<script>document.location = 'merchant.php';</script>";
       exit;
     }else{
       $get_data = $check_id->fetchObject();

       $file_1 = "data:" . $get_data->img_type_commercial . ";base64," . base64_encode($get_data->img_file_commercial);
       $file_2 = "data:" . $get_data->img_type_tax . ";base64," . base64_encode($get_data->img_file_tax);
       $file_3 = "data:" . $get_data->img_person_id . ";base64," . base64_encode($get_data->file_person_id);
       $file_4 = "data:" . $get_data->img_addr . ";base64," . base64_encode($get_data->file_addr);
       $file_5 = "data:" . $get_data->img_taxs . ";base64," . base64_encode($get_data->file_taxs);
     }

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
                       <h5 class="mb-0">معلومات <?php echo $get_data->full_name; ?></h5>
                     </div>
                     <div class="card-body">
                       <form method="POST" enctype="multipart/form-data">

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">البريد الكتروني</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->email; ?>" disabled>
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الرقم التواصل</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->contact_number; ?>" disabled>
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">نوع الكيان</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->type; ?>" disabled>
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">رمز الوثيقة او السجل التجاري</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->commercial_register; ?>" disabled>
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">تاريخ انتهاء الوثيقة او سجل التجاري</label>
                           <div class="col-sm-10">
                             <input type="date" class="form-control" id="basic-default-name" value="<?php echo $get_data->date; ?>" disabled>
                           </div>
                         </div>
                         
                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الرقم الضريبي</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->number_taxs; ?>" disabled>
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">رقم الهوية الشخص المسؤول</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->person_id; ?>" disabled>
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">رقم الايبان البنكي</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" value="<?php echo $get_data->tax; ?>" disabled>
                           </div>
                         </div>
                         

                         <div class="row justify-content-end">
                           <div class="col-sm-12 text-center">
                             <a href="<?php echo $file_1; ?>" class="btn btn-warning text-dark mb-2" download="ملف1">مرفق رمز الوثيقة او سجل التجاري</a>
                             <a href="<?php echo $file_2; ?>" class="btn btn-primary mb-2" download="ملف 2">مرفق الايبان البنكي</a>
                             <a href="<?php echo $file_3; ?>" class="btn btn-info text-dark mb-2" download="ملف 3">مرفق الهوية الشخص مسؤول</a>
                             <a href="<?php echo $file_4; ?>" class="btn btn-secondary mb-2" download="ملف 4">مرفق العنوان الوطني</a>
                             <a href="<?php echo $file_5; ?>" class="btn btn-danger mb-2" download="ملف 5">مرفق الرقم الضريبي</a>
                             <a href="product_merchant.php?id=<?php echo $id; ?>" class="btn btn-dark mb-2">مشاهدت المنتجات</a>
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
        <?php require "inc/footer.php"; ?>