<?php
      // here require menu or navbar right
      $pageName = "لوحة التحكم";

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
              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">

                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card bg-primary text-white">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="menu-icon bx bx-money"></i>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">العمولة البيع</span>
                          <h3 class="card-title mb-2 text-white">2,4334 ر.س</h3>
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
                          <span>الضريبة لوم</span>
                          <h3 class="card-title text-nowrap mb-1 text-dark">32 ر.س</h3>
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
                          <span class="d-block mb-1">مجموع المبيعات</span>
                          <h3 class="card-title text-nowrap mb-2 text-warning">4,333 ر.س</h3>
                        </div>
                      </div>
                    </div>

                    <div class="col-6 mb-4">
                      <div class="card bg-danger text-white">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <i class="menu-icon  bx bxs-wallet"></i>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">الاجمالي بعد خصم العمولات</span>
                          <h3 class="card-title mb-2 text-white">2,0342 ر.س</h3>
                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

        <?php require 'inc/footer.php'; ?>