<?php
      // here require menu or navbar right
      $pageName = "المنتجات";
      require "inc/menu.php";
      // here include db connect
      require "../../inc/config/db.php";
      // here require generate code
      require "../../inc/asset/code.php";

      // data select dynamic
      $select = $conn->query("SELECT * FROM category");

      // here send form or save with database
      if(isset($_POST['btn'])):
              // here filter data
          $title = filter_var($_POST['name_product'],FILTER_SANITIZE_STRING);
          $price = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
          $weight = filter_var($_POST['weight'],FILTER_SANITIZE_NUMBER_INT);

          $categorys = filter_var($_POST['categorys'],FILTER_SANITIZE_NUMBER_INT);
          $name_color = filter_var($_POST['name_color'],FILTER_SANITIZE_STRING);
          $size = filter_var($_POST['size'],FILTER_SANITIZE_STRING);
          $description_api = strip_tags($_POST['description']);
          $description = $_POST['description'];

          // here new inputs
          if(!empty($_POST['quantity'])){
            $quantity = filter_var($_POST['quantity'],FILTER_SANITIZE_NUMBER_INT);
          }elseif(empty($_POST['quantity'])){
            $quantity = "غير محدود";
          }
          $price_copun = filter_var($_POST['price_copun'],FILTER_SANITIZE_NUMBER_INT);
          $return = filter_var($_POST['return'],FILTER_SANITIZE_STRING);
          $grenty = filter_var($_POST['grenty'],FILTER_SANITIZE_STRING);
          // end new inputs



          
          // here check data is not null
          if(empty($title)|| empty($weight) || empty($price) || empty($categorys) || empty($description) || empty($_FILES['file']['tmp_name']) || !isset($_FILES['file']['tmp_name'])):
            echo "<script>alert('رجاء املاء بيانات بشكل صحيح');</script>";
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
                      $insert = $conn->prepare("INSERT INTO product(title,price,Weight,category,size_title,size,description,description_api,img_type,img_file,price_coupon,quantity,rt_product,grenti,generate_code) VALUES(:title,:price,:Weight,:category,:size_title,:size,:description,:description_api,:img_type,:img_file,:price_coupon,:quantity,:rt_product,:grenti,:generate_code)");
                      $insert->bindParam("title",$title);
                      $insert->bindParam("price",$price);
                      $insert->bindParam("Weight",$weight);

                      $insert->bindParam("category",$categorys);
                      $insert->bindParam("size_title",$name_color);
                      $insert->bindParam("size",$size);
                      $insert->bindParam("description",$description);
                      $insert->bindParam("description_api",$description_api);
                      $insert->bindParam("img_type",$imgType);
                      $insert->bindParam("img_file",$first_rename);
                      $insert->bindParam("price_coupon",$price_copun);
                      $insert->bindParam("quantity",$quantity);
                      $insert->bindParam("rt_product",$return);
                      $insert->bindParam("grenti",$grenty);
                      $insert->bindParam("generate_code",createRandomCode());
                      
                      if($insert->execute()){
                        // here add more image
                        $product = $conn->query("SELECT * FROM `product` ORDER BY ID DESC LIMIT 1 OFFSET 0");
                        // here data conversion
                        $product = $product->fetchObject();
                        $id = $product->ID;

                        
                        // here insert other image
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
                        <h5 class="mb-0">اضافة المنتج</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">الاسم المنتج</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" placeholder="منتج" name="name_product">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">سعر منتج</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="basic-default-number" placeholder="200 ر.س" name="price">
                            </div>
                          </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">وزن المنتج</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-number" placeholder="15 ك.ج" name="weight">
                                </div>
                            </div>
                          
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">سعر منتج بعد الخصم</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="basic-default-number" placeholder="120 ر.س" name="price_copun">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">الكمية المتبقية</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="basic-default-number" placeholder="30,غير محدود" name="quantity">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">التصنيف منتج</label>
                            <div class="col-sm-10">
                              <select id="defaultSelect" class="form-select" name="categorys">
                              <?php foreach($select AS $categorys): ?>  
                                <option value="<?php echo $categorys['id'];?>">
                                      <?php echo $categorys['Title']; ?>
                                  </option>
                              <?php endforeach; ?>
                              </select>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">حالة الارجاع</label>
                            <div class="col-sm-10">
                              
                              <div class="col-md">
                                
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="return" id="inlineRadio22" value="المنتج غير قابل للارجاع" checked>
                                  <label class="form-check-label" for="inlineRadio22">المنتج غير قابل للارجاع</label>
                                </div>

                                <div class="form-check form-check-inline mt-3">
                                  <input class="form-check-input" type="radio" name="return" id="inlineRadio11" value="المنتج قابل للارجاع">
                                  <label class="form-check-label" for="inlineRadio11">المنتج قابل للارجاع</label>
                                </div>

                              </div>

                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">ضمان المنتج</label>
                            <div class="col-sm-10">
                              
                              <div class="col-md">
                                
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="grenty" id="inlineRadio222" value="لا يوجد ضمان على المنتج" checked>
                                  <label class="form-check-label" for="inlineRadio222">لا يوجد ضمان على المنتج</label>
                                </div>

                                <div class="form-check form-check-inline mt-3">
                                  <input class="form-check-input" type="radio" name="grenty" id="inlineRadio111" value="يوجد ضمان على المنتج 12 شهر">
                                  <label class="form-check-label" for="inlineRadio111">يوجد ضمان على المنتج 12 شهر</label>
                                </div>

                                <div class="form-check form-check-inline mt-3">
                                  <input class="form-check-input" type="radio" name="grenty" id="inlineRadio333" value="يوجد ضمان على المنتج 24 شهر">
                                  <label class="form-check-label" for="inlineRadio333">يوجد ضمان على المنتج 24 شهر</label>
                                </div>

                              </div>

                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">مقاسات</label>
                            <div class="col-sm-10">
                              
                              <div class="col-md">
                                
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" checked>
                                  <label class="form-check-label" for="inlineRadio2">بدون مقاس</label>
                                </div>

                                <div class="form-check form-check-inline mt-3">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                  <label class="form-check-label" for="inlineRadio1">اختيار مقاس</label>
                                </div>
                                
                                <!-- here size product -->
                                <div class="col-sm-12 mt-3" id="roleinput" style="display: none;">
                                  <input type="text" class="form-control mb-3" placeholder="الاسم الوان" name="name_color">
                                  <input type="text" class="form-control" placeholder="small,large,xl,xxl,42,43,44,45,plus,lite" name="size">
                                </div>

                              </div>

                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">الوصف</label>
                            <div class="col-sm-10">
                              <textarea class="form-control resize-none" name="description" id="editor" style="height: 100px;resize:none"></textarea>
                            </div>
                          </div>

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
                              <button type="submit" class="btn btn-dark" name="btn">اضافة المنتج</button>
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