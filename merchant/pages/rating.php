<?php
      // here require menu or navbar right
      $pageName = "مراجعات";

      require "inc/menu.php";
      
      // here include db connect
      require "../../inc/config/db.php";
      // require check member is merchant or no
      require "inc/check_member.php";
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    مراجعات وتقيمات
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>الاسم الشخص</th>
                        <th>عنوان المنتج</th>
                        <th>الصورة</th>
                        <th>السعر</th>
                        <th>المراجعة</th>
                        <th>تاريخ مراجعة</th>
                        <th>اعدادت</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم المنتج</strong></td>
                        <td>عنوان العميل</td>

                        <td>
                          <img src="../assets/img/product/1.jpg" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">129$</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    5 نجوم
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-warning me-1">2022/8/14</span>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="javascript:void(0);"><i class="bx bxs-package me-1"></i>تم توصيل الطلب</a>
                              <a class="dropdown-item text-warning" href="javascript:void(0);"><i class="bx bx-error-circle"></i>الغاء الطلب</a>
                              <a class="dropdown-item text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr>  

                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم المنتج</strong></td>
                        <td>عنوان العميل</td>

                        <td>
                          <img src="../assets/img/product/1.jpg" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">129$</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    الاسم عميل
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-warning me-1">2022/8/14</span>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="javascript:void(0);"><i class="bx bxs-package me-1"></i>تم توصيل الطلب</a>
                              <a class="dropdown-item text-warning" href="javascript:void(0);"><i class="bx bx-error-circle"></i>الغاء الطلب</a>
                              <a class="dropdown-item text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr>   
                      
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم المنتج</strong></td>
                        <td>عنوان العميل</td>

                        <td>
                          <img src="../assets/img/product/1.jpg" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">129$</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    الاسم عميل
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-warning me-1">2022/8/14</span>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="javascript:void(0);"><i class="bx bxs-package me-1"></i>تم توصيل الطلب</a>
                              <a class="dropdown-item text-warning" href="javascript:void(0);"><i class="bx bx-error-circle"></i>الغاء الطلب</a>
                              <a class="dropdown-item text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr>   
                      
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم المنتج</strong></td>
                        <td>عنوان العميل</td>

                        <td>
                          <img src="../assets/img/product/1.jpg" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">129$</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    الاسم عميل
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-warning me-1">2022/8/14</span>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="javascript:void(0);"><i class="bx bxs-package me-1"></i>تم توصيل الطلب</a>
                              <a class="dropdown-item text-warning" href="javascript:void(0);"><i class="bx bx-error-circle"></i>الغاء الطلب</a>
                              <a class="dropdown-item text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr>   
                      
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>الاسم المنتج</strong></td>
                        <td>عنوان العميل</td>

                        <td>
                          <img src="../assets/img/product/1.jpg" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">129$</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    الاسم عميل
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-warning me-1">2022/8/14</span>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="javascript:void(0);"><i class="bx bxs-package me-1"></i>تم توصيل الطلب</a>
                              <a class="dropdown-item text-warning" href="javascript:void(0);"><i class="bx bx-error-circle"></i>الغاء الطلب</a>
                              <a class="dropdown-item text-danger" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>الحذف</a>
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

          <?php require 'inc/footer.php'; ?>