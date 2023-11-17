<?php
      // here require menu or navbar right
      $pageName = "المنتجات";
      require "inc/menu.php";
      // here include db connect
      require "../../inc/config/db.php";
      // here require generate code
      require "../../inc/asset/code.php";


      // here send form or save with database
      if(isset($_POST['btn'])):
              // here filter data
          $country_name = filter_var($_POST['countries'],FILTER_SANITIZE_STRING);
          $country_code = filter_var($_POST['countries'],FILTER_SANITIZE_STRING);

          $price = filter_var($_POST['price'],FILTER_SANITIZE_NUMBER_INT);

          $min_weight = filter_var($_POST['min_weight'],FILTER_SANITIZE_NUMBER_INT);
          $max_weight = filter_var($_POST['max_weight'],FILTER_SANITIZE_NUMBER_INT);


          // here new inputs
          if(!empty($_POST['additional_price'])){
              $additional_price = filter_var($_POST['additional_price'],FILTER_SANITIZE_NUMBER_INT);
          }elseif(empty($_POST['additional_price'])){
              $additional_price = 0;
          }


//          echo "<pre>";
//          print_r($_POST);
//          echo "</pre>";          // here check data is not null
          if(empty($country_name)|| empty($min_weight) || empty($price) || empty($max_weight)):
            echo "<script>alert('رجاء املاء بيانات بشكل صحيح');</script>";
          else:

                                
                      // here insert data
                      $insert = $conn->prepare("INSERT INTO shipping(country_name,country_code,min_weight,max_weight,price,additional_price) VALUES(:country_name,:country_code,:min_weight,:max_weight,:price,:additional_price)");
                      $insert->bindParam("country_name",$country_name);
                      $insert->bindParam("country_code",$country_code);
                      $insert->bindParam("min_weight",$min_weight);

                      $insert->bindParam("max_weight",$max_weight);
              $insert->bindParam("price",$price);

              $insert->bindParam("additional_price",$additional_price);
                        $insert->execute();

                      if($insert->execute()){
                        // here add more image

                        // here insert other image
                        // if isset name files isset
                        echo "<script>document.location = 'home.php';</script>";



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
                        <h5 class="mb-0">اضافة تفاصيل الشحن</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-email">الدولة</label>
                                <div class="col-sm-10">
                                    <select id="defaultSelect" class="form-select" name="countries">
                                        <option value="Saudi">
                                            السعودية
                                        </option>
                                        <option value="Bahrain">
                                            البحرين
                                        </option>
                                        <option value="Qatar">
                                            قطر
                                        </option><option value="Kuwait">
                                            الكويت
                                        </option>
                                        <option value="UAE">
                                            الامارات
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">اقل وزن للمنتج</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-number" placeholder="1 ك.ج" name="min_weight">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">اقصي وزن للمنتج</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-number" placeholder="15 ك.ج" name="max_weight">
                                </div>
                            </div>
                          
                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">سعر الشحن</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="basic-default-number" placeholder="120 ر.س" name="price">
                            </div>
                          </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">السعر الاضافي لكل كيلو </label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="basic-default-number" placeholder="120 ر.س" name="additional_price">
                                </div>
                            </div>













                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-dark" name="btn">اضافة </button>
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