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

      // هنا نحقق هل هذا اي دي موجود ام لا
      $check_id = $conn->prepare("SELECT * FROM product WHERE ID = :id");
      $check_id->bindParam("id",$id);
      $check_id->execute();
      // تحقق من اي دي سطر واحد موجود او اكثر
      if($check_id->rowCount() != 1){
        echo "<script>document.location = 'product.php';</script>";
        exit;
      }

      // here send form or save with database
      if(isset($_POST['btn'])):

          // here check data is not null
          if(empty($_FILES['file']['tmp_name']) || !isset($_FILES['file']['tmp_name'])):
            echo "<script>alert('رجاء ارفع صورة بشكل صحيح');</script>";
          else:
           
            // here upload image file with folder product
            // =======================================================================
            
            if(isset($_FILES['file']['tmp_name'])){

              $imgFile = $_FILES['file']['tmp_name'];
                $imgType = $_FILES['file']["type"];
                $imgFile = $_FILES['file']['tmp_name'];
                $imgName = $_FILES['file']['name'];
                $imgSize = $_FILES['file']['size'];
              // here check image ! isset
              if(!empty($imgName) && !empty($imgFile)){
  
                //securi file upload
                $first_format = array('jpg','png','gif','jpeg');
                $first_file = explode('.',$imgName);
                $first_file = end($first_file);
                $first_rename = "product/" . rand(0,10000000) . $imgName;
  
                if(in_array($first_file , $first_format)){
                    if($imgSize <= 85246026){
  
                      move_uploaded_file($imgFile,'../../'.$first_rename);
                      
          
                      // here insert data
                      $insert = $conn->prepare("UPDATE product SET img_type=:img_type,img_file = :img_file WHERE ID = :id");
                      $insert->bindParam("img_type",$imgType);
                      $insert->bindParam("img_file",$first_rename);
                      $insert->bindParam("id",$id);
                      
                      if($insert->execute()){
                        
                        // here update other image
                        $check_img = $conn->prepare("SELECT * FROM img_product WHERE product_id = :id");
                        $check_img->bindParam("id",$id);
                        $check_img->execute();

                        // check
                        if($check_img->rowCount() != 0){
                              // here remove file image with folder image_product
                              foreach($check_img AS $name_img){
                                $path = "../../" . $name_img['file_src'];
                                @unlink($path);    
                            }

                            // delete old image
                            $old_img = $conn->prepare("DELETE FROM img_product WHERE product_id = :id");
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
                              $rename = "image_product/" . rand(0,10000000) . $imageName;

                              if(in_array($files , $format)){
                                  if($imageSize <= 25246026){

                                    move_uploaded_file($imageFile,'../../'.$rename);

                                    $rename = 'https://'.$_SERVER['HTTP_HOST'].'/'.$rename;
                                    
                                    // here upload image with database
                                    $upload = $conn->prepare("INSERT INTO img_product(file_type,file_src,product_id) VALUES(:file_type,:file_src,:product_id)");
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
                    }
                  }

                }
              }
            // =======================================================================
            // end upload img

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