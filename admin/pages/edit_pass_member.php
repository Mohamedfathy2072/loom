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
         $password = $_POST['password'];

        if(empty($_POST['password'])){
            echo "<script>alert('رجاء املاء كلمة المرور بشكل صحيح');";
        }else{

            $password = md5($_POST['password']);
            // here insert data
           $edit = $conn->prepare("UPDATE member SET password=:password WHERE id = :id");
           $edit->bindParam("password",$password);
           $edit->bindParam("id",$id);
           $edit->execute();

           echo "<script>
                    alert('تم تحديث  كلمة المرور بنجاح');
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
                       <h5 class="mb-0">اضافة سلايدر</h5>
                     </div>
                     <div class="card-body">
                       <form method="POST">

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">البريد الكتروني</label>
                           <div class="col-sm-10">
                             <input type="email" disabled class="form-control" id="basic-default-name" value="<?php echo $get_data->email; ?>">
                           </div>
                         </div>

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">كلمة السر</label>
                           <div class="col-sm-10">
                             <input type="password" class="form-control" id="basic-default-name" name="password">
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