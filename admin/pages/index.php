<?php
      // here require menu or navbar right
      $pageName = "لوحة تحكم لوم";

      require "inc/menu.php";

      // require database
      require "../../inc/config/db.php";

      // here show commission website 
      $commission = $conn->query("SELECT * FROM commission WHERE id = 1");
      $commission = $commission->fetch(PDO::FETCH_ASSOC);

      // here show tax website 
      $tax = $conn->query("SELECT * FROM commission WHERE id = 2");
      $tax = $tax->fetch(PDO::FETCH_ASSOC);
      
    ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">

                  <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-6 mb-4">
                        <div class="card">
                          <div class="card-body">

                          <a href="others/sales_loom.php" class="text-dark">
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="../assets/img/icons/unicons/wallet-info.png"
                                  alt="Credit Card"
                                  class="rounded"
                                />
                              </div>
                            </div>
                              <span class="fw-semibold d-block mb-1">مبيعات لوم الخاصة</span>
                              <h3 class="card-title text-nowrap mb-1">340</h3>
                            </a>

                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="row">

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">

                          <a href="others/commission.php" class="text-dark">
                            
                            <div class="card-title d-flex align-items-start justify-content-between">
                              <div class="avatar flex-shrink-0">
                                <img
                                  src="../assets/img/icons/unicons/chart-success.png"
                                  alt="chart success"
                                  class="rounded"
                                />
                              </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">عمولة</span>
                            <h3 class="card-title mb-2"><?php echo $commission['number']; ?> ر.س</h3>
                            
                          </a>

                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">

                        <a href="others/sales.php" class="text-dark">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="../assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                           </div>
                            <span class="fw-semibold d-block mb-1">المبيعات</span>
                            <h3 class="card-title text-nowrap mb-1">5987</h3>
                          </a>

                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">

                        <a href="others/all_money.php" class="text-dark">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                          </div>
                          
                          <span class="fw-semibold d-block mb-1">الكلي بعد خصم عملات</span>
                          <h3 class="card-title text-nowrap mb-2">405 ر.س</h3>
                        </a>

                        </div>
                      </div>
                    </div>

                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          
                        <a href="others/all_withdraw.php" class="text-dark">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            
                          </div>
                          <span class="fw-semibold d-block mb-1">تحويل بنكي الاجمالي</span>
                          <h3 class="card-title mb-2">14530 ر.س</h3>
                        </a>

                        </div>
                      </div>
                    </div>


                  </div>
                </div>
              </div>

              <div class="row">
                
                <!-- Transactions -->
                <div class="col-md-6 col-lg-12 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">اخر 24 ساعة</h5>
                    </div>
                    
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">الشحن</small>
                              <h6 class="mb-0">مبالغ الشحن</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">82.6</h6>
                              <span class="text-muted">ر.س</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">

                          <a href="others/tax.php">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                            </div>
                          </a>

                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">الضرائب</small>
                              <h6 class="mb-0">الضريبة</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0"><?php echo $tax['number']; ?></h6>
                              <span class="text-muted">ر.س</span>
                            </div>
                          </div>
                        </li>
                        
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">رسوم</small>
                              <h6 class="mb-0">رسوم الدفع الكتروني</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">838.71</h6>
                              <span class="text-muted">ر.س</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">رسوم</small>
                              <h6 class="mb-0">رسوم بوابات الدفع</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">340</h6>
                              <span class="text-muted">ر.س</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded" />
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">التسويق</small>
                              <h6 class="mb-0">التسويق بالعمولة</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">92.45</h6>
                              <span class="text-muted">ر.س</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>

                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

      <?php require "inc/footer.php"; ?>