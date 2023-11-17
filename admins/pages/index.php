<?php
      // here require menu or navbar right
      $pageName = "لوحة التحكم";

      require "inc/menu.php";
      
    ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">

                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card bg-primary text-white">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="menu-icon  bx bx-user"></i>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">عدد طلبات</span>
                          <h3 class="card-title mb-2 text-white">2334</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card bg-warning text-dark">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="menu-icon  bx bx-error-circle"></i>
                            </div>
                          </div>
                          <span>طلبات تم الغاءها</span>
                          <h3 class="card-title text-nowrap mb-1 text-dark">344</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card bg-dark text-warning">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="menu-icon  bx bx-store-alt"></i>
                            </div>
                          </div>
                          <span class="d-block mb-1">البائعين</span>
                          <h3 class="card-title text-nowrap mb-2 text-warning">43</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-6 mb-4">
                      <div class="card bg-danger text-white">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="menu-icon  bx bx-user"></i>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">العملاء</span>
                          <h3 class="card-title mb-2 text-white">434</h3>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

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

            </div>
            <!-- / Content -->
          </div>

        <?php require 'inc/footer.php'; ?>