<?php
      // here require menu or navbar right
      $pageName = "التقارير";

      require "inc/menu.php";

      // here include db connect
      require "../../inc/config/db.php";
      // require check member is merchant or no
      require "inc/check_member.php";
      
    ?>

    <style>
      
    @media print {
      nav{
        display: none !important;
      }

      #btn-print{
        display: none;
      }
    }

    </style>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">

                <div class="col-lg-2">
                  <button class="btn btn-primary mb-3" id="btn-print" onclick="window.print();">طباعة التقرير</button>
                </div>

                <div class="col-lg-12 col-md-12 order-1">

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

                <div class="col-lg-12">
                  <div>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>

                </div>
              </div>


              <div class="row mt-5 pt-5">
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
          
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['المنتجات المرفوظة من قبل الإدارة', 'بانتظار مراجعة من قبل الإدارة', 'المنتجات التي تم نشرها', 'المنتجات التي لم يتم نشرها'],
      datasets: [{
        label: 'اجمالي المنتجات',
        data: [65, 59, 80, 81],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgb(211 64 229 / 20%)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(75, 192, 192)',
          'rgb(211 ,64 ,229)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

  
        <?php require 'inc/footer.php'; ?>