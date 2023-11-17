<?php
      // here require menu or navbar right
      $pageName = "النقد والسحب";
      require "inc/menu.php";
?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    النقد والسحب
                </h5>

                <button class="btn btn-warning text-dark me-auto ms-2">
                    <i class='bx bxs-file-pdf'></i>
                </button>

                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>الاسم البائع</th>
                        <th>الاسم المتجر</th>
                        <th>طريقة الدفع</th>
                        <th>المبلغ</th>
                        <th>تاريخ الطلب</th>
                        <th>معلومات الدفع</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                      <tr>
                        <td>1</td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> 
                            <strong>الاسم البائع</strong>
                        </td>

                        <td>
                            الاسم المتجر هنا
                        </td>

                        <td>
                            <span class="badge bg-label-success me-1">
                                <a href="javascript:void(0)" class="text-success">
                                    باي بال
                                </a>
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">202 ر.س</span>
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

    <?php require "inc/footer.php"; ?>