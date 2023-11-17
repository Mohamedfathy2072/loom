<?php
    // here require menu or navbar right
    $pageName = "المنتجات";
    require_once "../inc/menu_folder.php";
    
    // check id and filter
    if(empty($_GET['id']) or !isset($_GET['id'])){
        header("location: categorys.php",true);
        exit;
    }else{
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }

    require "../../../inc/config/db.php";
    
    $check = $conn->prepare("SELECT * FROM category WHERE id = :id");
    $check->bindParam("id",$id);
    $check->execute();
    if($check->rowCount() != 1){
        header("location: categorys.php",true);
        exit;
    }else{
        $check = $check->fetchObject();
    }

    if(isset($_POST['save'])):
        $text = filter_var($_POST['text'],FILTER_SANITIZE_STRING);
        // here check data not null
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

                    @unlink("../../../".$check->image_file);

                    $submit = $conn->prepare("UPDATE category SET Title=:text,image_type = :image_type,image_file = :image_file WHERE id = :id");
                    $submit->bindParam("text",$text);
                    $submit->bindParam("image_type",$imgType);
                    $submit->bindParam("image_file",$first_rename);
                    $submit->bindParam("id",$id);
                    if($submit->execute()):
                        echo "<script>
                            alert('تم تحديث التصنيف بنجاح');
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
                        <h5 class="mb-0">تعديل التصنيف</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">الاسم التصنيف</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" placeholder="التصنيف" name="text" value="<?php echo $check->Title; ?>" required>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">الصورة التصنيف</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control mb-3" name="file" accept=".png, .jpg, .jpeg">
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