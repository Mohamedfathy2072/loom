<?php
        // check get id
        if(empty($_GET['id']) or !isset($_GET['id'])){
            header("location: pages.php",true);
            exit;
        }else{
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        }

      // here require menu or navbar right
      $pageName = "الصفحات التعريفية";
      require "inc/menu.php";
      
      // permsion edit
      if(empty($_SESSION['role_edit']) || $_SESSION['role_edit'] != "التعديل"){
        echo "<script>document.location = 'index.php';</script>";
        exit;
      }

     // here include db connect
     require "../../inc/config/db.php";

     // هنا نحقق هل هذا اي دي موجود ام لا
     $check_id = $conn->prepare("SELECT * FROM slider WHERE id = :id");
     $check_id->bindParam("id",$id);
     $check_id->execute();
     // تحقق من اي دي سطر واحد موجود او اكثر
     if($check_id->rowCount() != 1){
       echo "<script>document.location = 'pages.php';</script>";
       exit;
     }else{
       $get_data = $check_id->fetchObject();
     }

     // here send form or save with database
     if(isset($_POST['btn'])):
       // here filter data
         $url = filter_var($_POST['url'],FILTER_SANITIZE_URL);

         $imageType1 = $_FILES['file']["type"];
         $imageFile1 = $_FILES['file']['tmp_name'];
         // here check data is not null
         if(empty($imageType1) || empty($imageFile1)):
           echo "<script>alert('رجاء املاء بيانات بشكل صحيح');</script>";
         else:
           // here upload file and filter with database
           $imageType1 = filter_var($imageType1,FILTER_SANITIZE_STRING);
           $file = file_get_contents($imageFile1);

           // here insert data
           $edit = $conn->prepare("UPDATE slider SET url=:url,img_type=:img_type ,img_file=:img_file WHERE id = :id");
           $edit->bindParam("url",$url);
           $edit->bindParam("img_type",$imageType1);
           $edit->bindParam("img_file",$file);
           $edit->bindParam("id",$id);
           $edit->execute();

           echo "<script>
                    document.location = 'pages.php';    
                </script>";
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
                       <h5 class="mb-0">اضافة سلايدر</h5>
                     </div>
                     <div class="card-body">
                       <form method="POST" enctype="multipart/form-data">

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">الرابط الصورة</label>
                           <div class="col-sm-10">
                             <input type="url" class="form-control" id="basic-default-name" placeholder="هنا اكتب الرابط الصورة" name="url" value="<?php echo $get_data->url; ?>">
                           </div>
                         </div>
                         
                         
                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-company">الصورة سلايدر</label>
                           <div class="col-sm-10">
                           <input type="file" class="form-control mb-3" name="file" accept=".png, .jpg, .jpeg">
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