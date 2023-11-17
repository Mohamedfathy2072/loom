<?php
      // here require menu or navbar right
      $pageName = "الطلبات";
      require "../inc/menu_folder.php";
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    قيد الاسترجاع

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
                            <span class="badge bg-label-warning me-1">قيد الاسترجاع</span>
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