<?php
        // check get id
        if(empty($_GET['id']) or !isset($_GET['id'])){
            header("location: member.php",true);
            exit;
        }else{
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        }

      // here require menu or navbar right
      $pageName = "العملاء";
      require "inc/menu.php";

      // permsion edit
      if(empty($_SESSION['role_edit']) || $_SESSION['role_edit'] != "التعديل"){
        echo "<script>document.location = 'index.php';</script>";
        exit;
      }
      
     // here include db connect
     require "../../inc/config/db.php";

     // هنا نحقق هل هذا اي دي موجود ام لا
     $check_id = $conn->prepare("SELECT * FROM member WHERE id = :id");
     $check_id->bindParam("id",$id);
     $check_id->execute();
     // تحقق من اي دي سطر واحد موجود او اكثر
     if($check_id->rowCount() != 1){
       echo "<script>document.location = 'member.php';</script>";
       exit;
     }else{
       $get_data = $check_id->fetchObject();
     }

     // here send form or save with database
     if(isset($_POST['btn'])):
       // here filter data
         $first_name = filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
         $last_name = filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
         $phone_number = filter_var($_POST['phone_number'],FILTER_SANITIZE_NUMBER_INT);
         $status = filter_var($_POST['status'],FILTER_SANITIZE_STRING);

         if(empty($first_name) || empty($last_name) || empty($phone_number) || empty($status)){
            echo "<script>alert('رجاء لا ترسل بيانات فارغة')</script>";
         }else{
            // here insert data
            $edit = $conn->prepare("UPDATE member SET first_name=:first_name,last_name=:last_name ,phone_number = :phone_number,status = :status WHERE id = :id");
            $edit->bindParam("first_name",$first_name);
            $edit->bindParam("last_name",$last_name);
            $edit->bindParam("phone_number",$phone_number);
            $edit->bindParam("status",$status);
            $edit->bindParam("id",$id);
            $edit->execute();

            echo "<script>
                    alert('تم تحديث بنجاح');
                    document.location = 'member.php';    
                </script>";
         }
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
                       <h5 class="mb-0">تعديل المعلومات</h5>
                     </div>
                     <div class="card-body">
                       <form method="POST">

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الاسم الاول</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" name="first_name" value="<?php echo $get_data->first_name; ?>">
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الاسم عائلة</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" name="last_name" value="<?php echo $get_data->last_name; ?>">
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">البريد الكتروني</label>
                           <div class="col-sm-10">
                             <input type="email" disabled class="form-control" id="basic-default-name" value="<?php echo $get_data->email; ?>">
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الرقم هاتف</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" name="phone_number" value="<?php echo $get_data->phone_number; ?>">
                           </div>
                         </div>


                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">حالة الحساب</label>
                           <div class="col-sm-10">
                                <select class="form-select form-select-sm mt-1 pt-2 pb-2" aria-label=".form-select-sm example" name="status">
                                    <option disabled>الحالة</option>
                                    <option selected value="yes">مفعل</option>
                                    <option value="no">غير مفعل</option>
                                </select>
                           </div>
                         </div>
                         

                         <div class="row justify-content-end">
                           <div class="col-sm-10">
                             <button type="submit" class="btn btn-dark" name="btn">حفظ التعديلات</button>
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