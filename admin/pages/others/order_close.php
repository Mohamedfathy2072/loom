<?php
      // here require menu or navbar right
      $pageName = "الطلبات";
      require "../inc/menu_folder.php";
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

          <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
                  
                  <div class="row justify-content-center">
                    <div class="col-2 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <i class='bx bxs-watch fs-1 text-warning'></i>
                            </div>
                          </div>
                          <span class="d-block mb-1">بانتظار الدفع</span>
                          <h3 class="card-title text-nowrap mb-2">0</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <i class='bx bx-stopwatch fs-1 text-info'></i>
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">بانتظار المراجعة</span>
                          <h3 class="card-title mb-2">0</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <i class='bx bx-gift fs-1 text-primary'></i>
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">قيد التنفيذ</span>
                          <h3 class="card-title mb-2">0</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <i class='bx bxs-spreadsheet fs-1 text-success'></i>
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">تم التنفيذ</span>
                          <h3 class="card-title mb-2">0</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <i class='bx bxs-cart-download fs-1'></i>
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">تم الشحن</span>
                          <h3 class="card-title mb-2">0</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-2 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                            <i class='bx bxs-x-circle fs-1 text-danger'></i>
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">طلبات ملغية</span>
                          <h3 class="card-title mb-2">0</h3>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    طلبات الملغاه

                  <form class="mt-5 d-flex" method="GET">
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-search" placeholder="البحث برقم الطلب" name="search">
                      </div>
                      <div class="col-sm-2 me-2">
                        <button type="submit" class="btn btn-dark" name="btn_search">
                            <i class="bx bx-search"></i>
                        </button>
                      </div>
                  </form>

                  <button class="btn btn-warning text-dark me-auto ms-2 d-flex">
                    <i class='bx bxs-file-pdf'></i>
                  </button>

                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>الاسم المنتج</th>
                        <th>العنوان</th>
                        <th>الصورة</th>
                        <th>السعر</th>
                        <th>اسم العميل</th>
                        <th>تاريخ الطلب</th>
                        <th>حالة الطلب</th>
                        <th>اعدادت الطلب</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                      <tr>
                        <td>1</td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم المنتج</strong></td>
                        <td>عنوان العميل</td>

                        <td>
                          <img src="../assets/img/product/1.jpg" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">129 ر.س</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    الاسم عميل
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-info me-1">2022/8/14</span>
                        </td>

                        <td>
                            <span class="badge bg-label-danger me-1">طلب ملغي</span>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">

                              <a class="dropdown-item text-info" href="javascript:void(0);">
                                <i class="bx bx-error-circle"></i>
                                 معلومات الطلب
                              </a>

                              <a class="dropdown-item text-primary" href="javascript:void(0);">
                                <i class="bx bxs-file-pdf me-1"></i>
                                    طباعة
                              </a>

                              <a class="dropdown-item text-danger" href="javascript:void(0);">
                                <i class="bx bx-trash me-1"></i>
                                الحذف
                              </a>
                              
                            </div>
                          </div>
                        </td>

                      </tr> 

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end table data product -->
          </div>
          <!-- / Content -->

    <?php require "../inc/footer_folder.php"; ?>