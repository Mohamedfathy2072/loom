<?php
     // here require menu or navbar right
     $pageName = "المنتجات";
     require_once "../inc/menu_folder.php";

    // require database
    require "../../../inc/config/db.php";

    if(isset($_POST['save'])):
        $text = filter_var($_POST['text'],FILTER_SANITIZE_STRING);
        
        if(empty($text)):
           echo "<script>
                    alert('رجاء لا ترسل فارغة');
            </script>";
        else:

           
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
              $first_rename = "slider/footer_slider/" . rand(0,10000000) . $imgName;

              if(in_array($first_file , $first_format)){
                  if($imgSize <= 45246026){

                    move_uploaded_file($imgFile,'../../../'.$first_rename);

                    $submit = $conn->prepare("INSERT INTO category(Title,image_type,image_file) VALUES(:text,:image_type,:image_file)");
                    $submit->bindParam("text",$text);
                    $submit->bindParam("image_type",$imgType);
                    $submit->bindParam("image_file",$first_rename);
                    if($submit->execute()):
                        echo "<script>
                            alert('تم حفظ التصنيف بنجاح');
                            document.location = 'categorys.php';
                        </script>";
                    endif;

                  }
                }
              }
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
                        <h5 class="mb-0">اضافة التصنيف</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">الاسم التصنيف</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" placeholder="التصنيف" name="text" required>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">الصورة التصنيف</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control mb-3" name="file" accept=".png, .jpg, .jpeg" required>
                            </div>
                          </div>
                          
                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-dark" name="save">حفظ</button>
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