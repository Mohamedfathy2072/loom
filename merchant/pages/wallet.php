<?php
      $pageName = "السحب";
      require "inc/menu.php";

      // here include db connect
      require "../../inc/config/db.php";
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
                        <h5 class="mb-0">سحب الرصيد</h5>
                      </div>
                      <div class="card-body">
                        <form method="POST">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">الطريقة للسحب</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control mb-3" name="wallet" placeholder="باي بال">
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">المبلغ للسحب</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control mb-3" name="wallet" placeholder="200 ر.س">
                          </div>

                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-warning text-dark" name="btn">سحب</button>
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