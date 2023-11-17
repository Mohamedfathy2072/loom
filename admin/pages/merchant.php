<?php
      // here require menu or navbar right
      $pageName = "نظام بائعين";
      require "inc/menu.php";
      // here require database
      require "../../inc/config/db.php";
      // here show data
      $data = $conn->query("SELECT * FROM signup_merchant INNER JOIN member ON signup_merchant.id_user = member.id ORDER BY signup_merchant.ID DESC");
      
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    <a href="request_success.php" class="btn btn-success text-dark">
                      الطلبات المقبولة 
                    </a>
                    
                    <a href="request_wit.php" class="btn btn-warning text-dark">
                      طلبات في الانتظار 
                    </a>
                    
                    <a href="request_close.php" class="btn btn-danger">
                      الطلبات المرفوضة
                    </a>

                    <form class="mt-5 d-flex" method="GET">
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-search" placeholder="البحث باسم المتجر" name="search">
                      </div>
                      <div class="col-sm-2 me-2">
                        <button type="submit" class="btn btn-dark" name="btn_search">
                            <i class="bx bx-search"></i>
                        </button>
                      </div>
                  </form>

                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>اسم البائع</th>
                        <th>اسم المتجر</th>
                        <th>البريد الالكتروني</th>
                        <th>حالة البائع</th>
                        <th>رقم التواصل</th>
                        <th>اعدادات البائع</th>
                    </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">
                    <?php 
                    // search in data
                          if(isset($_GET['btn_search'])):

                            $search_input = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
                            $searching = "%".$search_input."%";

                            $search = $conn->prepare("SELECT * FROM signup_merchant INNER JOIN member ON signup_merchant.id_user = member.id WHERE signup_merchant.name_store LIKE :search");
                            $search->bindParam("search",$searching);
                            $search->execute();
                            if($search->rowCount() == 0):
                              // if search not result
                      ?>
                         <div class="text-center py-3">
                              <h2> لا يوجد نتائج بحث</h2>
                         </div>
                      <?php 
                      // if result sesscsfuly
                      else:
                         foreach($search AS $show): ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show['full_name']; ?></strong></td>
                        <td><?php echo $show['name_store']; ?></td>
                        <td><?php echo $show['email']; ?></td>

                        <td>
                          <?php echo $show['status_merchants']; ?>
                        </td>

                        <td>
                          <?php echo $show['contact_number']; ?>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-success" href="merchant/sucsses.php?id=<?php echo $show['ID']; ?>"><i class='bx bx-check'></i> قبول البائع</a>
                              <a class="dropdown-item text-warning" href="merchant/close.php?id=<?php echo $show['ID']; ?>"><i class='bx bxs-x-circle'></i> رفض البائع</a>
                              <a class="dropdown-item text-primary" href="merchant/warning.php?id=<?php echo $show['ID']; ?>"><i class='bx bxs-time-five'></i> تحويل الطلب الي الانتظار</a>
                              <a class="dropdown-item text-info" href="merchant_view.php?id=<?php echo $show['ID']; ?>"><i class="bx bx-info-circle me-1"></i>مشاهدت الطلب</a>
                              <a class="dropdown-item text-danger" href="merchant/delete_request.php?id=<?php echo $show['ID']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                    <?php endforeach; ?>  
                    <?php 
                        endif;
                        // if not click button search
                        else:
                         foreach($data AS $show): 
                        ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show['full_name']; ?></strong></td>
                        <td><?php echo $show['name_store']; ?></td>
                        <td><?php echo $show['email']; ?></td>

                        <td>
                          <?php echo $show['status_merchants']; ?>
                        </td>

                        <td>
                          <?php echo $show['contact_number']; ?>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-success" href="merchant/sucsses.php?id=<?php echo $show['ID']; ?>"><i class='bx bx-check'></i> قبول البائع</a>
                              <a class="dropdown-item text-warning" href="merchant/close.php?id=<?php echo $show['ID']; ?>"><i class='bx bxs-x-circle'></i> رفض البائع</a>
                              <a class="dropdown-item text-primary" href="merchant/warning.php?id=<?php echo $show['ID']; ?>"><i class='bx bxs-time-five'></i> تحويل الطلب الي الانتظار</a>
                              <a class="dropdown-item text-info" href="merchant_view.php?id=<?php echo $show['ID']; ?>"><i class="bx bx-info-circle me-1"></i>مشاهدت الطلب</a>
                              <a class="dropdown-item text-danger" href="merchant/delete_request.php?id=<?php echo $show['ID']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr>
                    <?php endforeach; endif; ?>  
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end table data product -->
          </div>
          <!-- / Content -->
      <?php require "inc/footer.php"; ?>