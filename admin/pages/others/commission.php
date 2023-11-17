<?php
      // here require menu or navbar right
      $pageName = "لوحة تحكم لوم";
      require "../inc/menu_folder.php";
     // here include db connect
     require "../../../inc/config/db.php";

    //  Show commission in input
    $commission = $conn->query("SELECT * FROM commission WHERE id = 1");
    $commission = $commission->fetchObject();

    // update commission with database

    if(isset($_POST['btn'])):
        $number = filter_var($_POST['number'],FILTER_SANITIZE_NUMBER_INT);
        $update = $conn->prepare("UPDATE commission SET number = :number WHERE id = 1");
        $update->bindParam("number",$number);
        if($update->execute()):
            echo "<script>document.location = '../index.php';</script>";
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
                       <h5 class="mb-0">عمولة الموقع</h5>
                     </div>
                     <div class="card-body">
                       <form method="POST">

                         <div class="row mb-3">
                           <label class="col-sm-2 col-form-label" for="basic-default-name">عمولة الموقع</label>
                           <div class="col-sm-10">
                             <input type="text" class="form-control" id="basic-default-name" placeholder="هنا اكتب عمولة الموقع" value="<?php echo $commission->number; ?> ر.س" name="number">
                           </div>
                         </div>
                    

                         <div class="row justify-content-end">
                           <div class="col-sm-10">
                             <button type="submit" class="btn btn-dark" name="btn">تعديل عمولة</button>
                           </div>
                         </div>

                       </form>
                     </div>
                   </div>

                    <!-- start table data product here -->
                    <div class="card">
                      <h5 class="card-header">
                        العمولة المخصومة
                        <button class="btn btn-warning text-dark me-auto ms-2 d-flex">
                          <i class='bx bxs-file-pdf'></i>
                        </button>
                      </h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table table-hover">
                        <thead>

                          <tr>
                            <th>#</th>
                            <th>الاسم البائع</th>
                            <th>الاسم المتجر</th>
                            <th>العمولة المخصومة</th>
                            <th>اعدادت العمولة</th>
                          </tr>

                        </thead>

                        <tbody class="table-border-bottom-0">

                        <!-- start columns one  -->
                          <tr>
                            <td>1</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم البائع</strong></td>
                            <td>عنوان المتجر</td>

                            <td>
                                <span class="badge bg-label-danger me-1">34 ر.س</span>
                            </td>

                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="text-align: right;">

                                <a class="dropdown-item text-info" href="javascript:void(0);">
                                  <i class="bx bx-error-circle"></i>
                                  معلومات البائع
                                </a>

                                  <a class="dropdown-item text-secondary" href="javascript:void(0);">
                                    <i class="bx bxs-file-pdf me-1"></i>
                                        طباعة
                                  </a>

                                  <a class="dropdown-item text-warning" href="javascript:void(0);">
                                    <i class="bx bx-edit-alt me-1"></i>
                                        التعديل
                                  </a>

                                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                                    <i class="bx bx-trash me-1"></i>
                                    الحذف
                                  </a>
                                  
                                </div>
                              </div>
                            </td>

                          </tr> 
                          <!-- end columns one -->
                        <!-- here columns two -->
                          <tr>
                            <td>2</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم البائع</strong></td>
                            <td>عنوان المتجر</td>

                            <td>
                                <span class="badge bg-label-danger me-1">22 ر.س</span>
                            </td>

                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="text-align: right;">

                                <a class="dropdown-item text-info" href="javascript:void(0);">
                                  <i class="bx bx-error-circle"></i>
                                  معلومات البائع
                                </a>

                                  <a class="dropdown-item text-secondary" href="javascript:void(0);">
                                    <i class="bx bxs-file-pdf me-1"></i>
                                        طباعة
                                  </a>

                                  <a class="dropdown-item text-warning" href="javascript:void(0);">
                                    <i class="bx bx-edit-alt me-1"></i>
                                        التعديل
                                  </a>

                                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                                    <i class="bx bx-trash me-1"></i>
                                    الحذف
                                  </a>
                                  
                                </div>
                              </div>
                            </td>

                          </tr>   
                          <!-- end columns two -->
                        <!-- here columns 3 -->
                          <tr>
                            <td>3</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم البائع</strong></td>
                            <td>عنوان المتجر</td>

                            <td>
                                <span class="badge bg-label-danger me-1">22 ر.س</span>
                            </td>

                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="text-align: right;">

                                <a class="dropdown-item text-info" href="javascript:void(0);">
                                  <i class="bx bx-error-circle"></i>
                                  معلومات البائع
                                </a>

                                  <a class="dropdown-item text-secondary" href="javascript:void(0);">
                                    <i class="bx bxs-file-pdf me-1"></i>
                                        طباعة
                                  </a>

                                  <a class="dropdown-item text-warning" href="javascript:void(0);">
                                    <i class="bx bx-edit-alt me-1"></i>
                                        التعديل
                                  </a>

                                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                                    <i class="bx bx-trash me-1"></i>
                                    الحذف
                                  </a>
                                  
                                </div>
                              </div>
                            </td>

                          </tr>   
                          <!-- end columns 3 -->
                        <!-- here columns 4 -->
                          <tr>
                            <td>4</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم البائع</strong></td>
                            <td>عنوان المتجر</td>

                            <td>
                                <span class="badge bg-label-danger me-1">22 ر.س</span>
                            </td>

                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="text-align: right;">

                                <a class="dropdown-item text-info" href="javascript:void(0);">
                                  <i class="bx bx-error-circle"></i>
                                  معلومات البائع
                                </a>

                                  <a class="dropdown-item text-secondary" href="javascript:void(0);">
                                    <i class="bx bxs-file-pdf me-1"></i>
                                        طباعة
                                  </a>

                                  <a class="dropdown-item text-warning" href="javascript:void(0);">
                                    <i class="bx bx-edit-alt me-1"></i>
                                        التعديل
                                  </a>

                                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                                    <i class="bx bx-trash me-1"></i>
                                    الحذف
                                  </a>
                                  
                                </div>
                              </div>
                            </td>

                          </tr>   
                          <!-- end columns 4 -->
                        <!-- here columns 5 -->
                          <tr>
                            <td>5</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم البائع</strong></td>
                            <td>عنوان المتجر</td>

                            <td>
                                <span class="badge bg-label-danger me-1">22 ر.س</span>
                            </td>

                            <td>
                              <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="text-align: right;">

                                <a class="dropdown-item text-info" href="javascript:void(0);">
                                  <i class="bx bx-error-circle"></i>
                                  معلومات البائع
                                </a>

                                  <a class="dropdown-item text-secondary" href="javascript:void(0);">
                                    <i class="bx bxs-file-pdf me-1"></i>
                                        طباعة
                                  </a>

                                  <a class="dropdown-item text-warning" href="javascript:void(0);">
                                    <i class="bx bx-edit-alt me-1"></i>
                                        التعديل
                                  </a>

                                  <a class="dropdown-item text-danger" href="javascript:void(0);">
                                    <i class="bx bx-trash me-1"></i>
                                    الحذف
                                  </a>
                                  
                                </div>
                              </div>
                            </td>

                          </tr>   
                          <!-- end columns 5 -->

                        </tbody>
                      </table>
                    </div>
                  </div>
              <!-- end table data product -->
                 </div>
           </div>
           <!-- end form add product -->
         </div>
         <!-- / Content -->   

    <?php require "../inc/footer_folder.php"; ?>