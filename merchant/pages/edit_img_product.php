<?php

        // check get id
        if(empty($_GET['id']) or !isset($_GET['id'])){
            header("location: product.php",true);
            exit;
        }else{
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        }
      // here require menu or navbar right
      $pageName = "المنتجات";
      require "inc/menu.php";

      // here include db connect
      require "../../inc/config/db.php";
      // require check member is merchant or no
      require "inc/check_member.php";

      // هنا نحقق هل هذا اي دي موجود ام لا
        $check_id = $conn->prepare("SELECT * FROM product_merchant WHERE ID = :id AND id_user = :id_user");
        $check_id->bindParam("id",$id);
        $check_id->bindParam("id_user",$_SESSION['id']);
        $check_id->execute();
      // تحقق من اي دي سطر واحد موجود او اكثر
      if($check_id->rowCount() != 1){
        echo "<script>document.location = 'product.php';</script>";
        exit;
      }

      // here send form or save with database
      if(isset($_POST['btn'])):

        // here filter data
          $imageType1 = $_FILES['file']["type"];
          $imageFile1 = $_FILES['file']['tmp_name'];
          // here check data is not null
          if(empty($imageType1) || empty($imageFile1)):
            echo "<script>alert('رجاء ارفع صورة بشكل صحيح');</script>";
          else:
            // here upload file and filter with database
            $imageType1 = filter_var($imageType1,FILTER_SANITIZE_STRING);
            $file = file_get_contents($imageFile1);

            // here insert data
            $insert = $conn->prepare("UPDATE product_merchant SET img_type=:img_type,img_file = :img_file,status_product = 'في الانتظار' WHERE ID = :id AND id_user = :id_user");
            $insert->bindParam("img_type",$imageType1);
            $insert->bindParam("img_file",$file);
            $insert->bindParam("id",$id);
            $insert->bindParam("id_user",$_SESSION['id']);
            if($insert->execute()){
              
              // here update other image
              $check_img = $conn->prepare("SELECT * FROM img_product_merchant WHERE product_id = :id");
              $check_img->bindParam("id",$id);
              $check_img->execute();

              // check
              if($check_img->rowCount() != 0){
                    // here remove file image with folder image_product
                    foreach($check_img AS $split){
                      $explodes = explode("../../",$split['file_src']);
                      foreach($explodes AS $name_img){
                          $path = "../../" . $name_img;
                          @unlink($path);
                      }
                  }

                  // delete old image
                  $old_img = $conn->prepare("DELETE FROM img_product_merchant WHERE product_id = :id");
                  $old_img->bindParam("id",$id);
                  $old_img->execute();
                  
                }

              // if isset name files isset
              if(isset($_FILES['files']['tmp_name'])){  

                  $imageFile = $_FILES['files']['tmp_name'];
                  foreach($imageFile AS $loop => $key){
                    $imageType = $_FILES['files']["type"][$loop];
                    $imageFile = $_FILES['files']['tmp_name'][$loop];
                    $imageName = $_FILES['files']['name'][$loop];
                    $imageSize = $_FILES['files']['size'][$loop];
                  // here check image ! isset
                  if(!empty($imageName) && !empty($imageFile)):

                    //securi file upload
                    $format = array('jpg','png','gif','jpeg');
                    $files = explode('.',$imageName);
                    $files = end($files);
                    $rename = "../../image_product/" . rand(0,10000000) . $imageName;

                    if(in_array($files , $format)){
                        if($imageSize <= 25246026){

                          move_uploaded_file($imageFile,$rename);
                          // here upload image with database
                          $upload = $conn->prepare("INSERT INTO img_product_merchant(file_type,file_src,product_id) VALUES(:file_type,:file_src,:product_id)");
                          $upload->bindParam("file_type",$imageType);
                          $upload->bindParam("file_src",$rename);
                          $upload->bindParam("product_id",$id);
                          $upload->execute();

                        }else{
                          echo "<script>alert('رجاء ارفع الصورة 25 ميجا بايت او اقل');</script>";
                        }

                      }else{
                        echo "<script>alert('رجاء لا ترفع ملفات الاخرى فقط صورة مسموح');</script>";
                      }

                      
                  endif;
                    
                  }
              }
              echo "<script>document.location = 'product.php';</script>";
            }
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
                        <h5 class="mb-0">تعديل الصورة المنتج</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">الصورة منتج</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control mb-3" name="file" accept=".png, .jpg, .jpeg">
                              
                              <div id="tagsHere">

                              </div>

                                <button type="button" class="btn btn-dark btn-sm fs-4" id="addinput" style="height: 35px;">
                                    +
                                </button>

                             </div>
                          </div>

                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-warning text-dark" name="btn">حفظ التعديلات</button>
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