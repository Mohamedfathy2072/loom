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
        }else{
          $get_data = $check_id->fetchObject();
        }
      // data select dynamic
      $select = $conn->query("SELECT * FROM category");

      // here send form or save with database
      if(isset($_POST['btn'])):
        // here filter data
          $title = filter_var($_POST['name_product'],FILTER_SANITIZE_STRING);
          $price = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);
          $price = filter_var($_POST['weight'],FILTER_SANITIZE_NUMBER_INT);

          $categorys = filter_var($_POST['categorys'],FILTER_SANITIZE_NUMBER_INT);
          $name_color = filter_var($_POST['name_color'],FILTER_SANITIZE_STRING);
          $size = filter_var($_POST['size'],FILTER_SANITIZE_STRING);
          $description_api = strip_tags($_POST['description']);
          $description = $_POST['description'];

          // here new inputs
          $quantity = filter_var($_POST['quantity'],FILTER_SANITIZE_NUMBER_INT);
          if(empty($quantity)){
            $quantity = "غير محدود";
          }
          $price_copun = filter_var($_POST['price_copun'],FILTER_SANITIZE_NUMBER_INT);
          $return = filter_var($_POST['return'],FILTER_SANITIZE_STRING);
          $grenty = filter_var($_POST['grenty'],FILTER_SANITIZE_STRING);
          // end new inputs

          // here check data is not null
          if(empty($title) || empty($price) || empty($categorys) || empty($description)):
            echo "<script>alert('رجاء املاء بيانات بشكل صحيح');</script>";
          else:

            // here edit data
            $edit = $conn->prepare("UPDATE product SET title = :title,price = :price,weight= :weight,category=:category,size_title=:size_title,size=:size,description=:description,description_api = :description_api,price_coupon = :price_coupon,quantity = :quantity,rt_product = :rt_product,grenti = :grenti WHERE ID = :id");
            $edit->bindParam("title",$title);
            $edit->bindParam("price",$price);
              $edit->bindParam("weight",$weight);

              $edit->bindParam("category",$categorys);
            $edit->bindParam("size_title",$name_color);
            $edit->bindParam("size",$size);
            $edit->bindParam("description",$description);
            $edit->bindParam("description_api",$description_api);
            $edit->bindParam("price_coupon",$price_copun);
            $edit->bindParam("quantity",$quantity);
            $edit->bindParam("rt_product",$return);
            $edit->bindParam("grenti",$grenty);
            $edit->bindParam("id",$id);
            if($edit->execute()){
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
                        <h5 class="mb-0">تعديل المنتج</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">اسم المنتج</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" placeholder="منتج" name="name_product" value="<?php echo $get_data->title; ?>">
                            </div>
                          </div>
                          
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">سعر منتج</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="basic-default-number" placeholder="200 ر.س" name="price" value="<?= $get_data->price; ?>">
                            </div>
                          </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">وزن منتج</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-number" placeholder="200 ر.س" name="price" value="<?= $get_data->weight; ?>">
                                </div>
                            </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">السعر منتج بعد الخصم</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="basic-default-number" placeholder="120 ر.س" name="price_copun" value="<?= $get_data->price_coupon; ?>">
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">الكمية المتبقية</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-number" placeholder="30,غير محدود" name="quantity" value="<?= $get_data->quantity; ?>">
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
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                  <label class="form-check-label" for="inlineRadio2">بدون مقاس</label>
                                </div>

                                <div class="form-check form-check-inline mt-3">
                                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                  <label class="form-check-label" for="inlineRadio1">اختيار مقاس</label>
                                </div>
                                
                                <!-- here size product -->
                                <div class="col-sm-12 mt-3" id="roleinput" style="display: block;">
                                  <input type="text" class="form-control mb-3" placeholder="الاسم الوان" name="name_color" value="<?= $get_data->size_title; ?>">
                                  <input type="text" class="form-control" placeholder="small,large,xl,xxl,42,43,44,45,plus,lite" name="size" value="<?= $get_data->size; ?>">
                                </div>

                              </div>

                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-message">الوصف</label>
                            <div class="col-sm-10">
                              <textarea class="form-control resize-none" name="description" id="editor" style="height: 100px;resize:none">
                                <?= $get_data->description; ?>
                              </textarea>
                            </div>
                          </div>

                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary" name="btn">حفظ التعديلات</button>
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