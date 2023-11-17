<?php
      // here require menu or navbar right
      $pageName = "الصفحات التعريفية";
      require "inc/menu.php";
      // include database
      require "../../inc/config/db.php";

      $data = $conn->query("SELECT * FROM slider");
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">
           <!-- start table data here -->
            <div class="card">
              <div class="card-header d-flex"> 
                <h5>
                    سلايدر صفحة الرئيسية
                </h5>
                <a href="add_slider.php" class="btn btn-info text-dark text-end justify-content-end me-auto">اضافة سلايدر</a>
              </div>
                
                <div class="table-responsive text-nowrap">
                  
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>الرابط</th>
                        <th>الصورة</th>
                        <th>اعدادت الطلب</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">
                    <?php foreach($data AS $show_data): ?>
                      <tr>

                        <td>
                          <?= $show_data['url']; ?>
                        </td>

                        <td>
                          <img src="../../<?= $show_data['img_file']; ?>" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                       
                        <td>

                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>

                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="edit_slider.php?id=<?= $show_data['id']; ?>"><i class="bx bxs-edit me-1"></i>تعديل</a>
                              <a class="dropdown-item text-danger" href="trash/delete_slider.php?id=<?= $show_data['id']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>

                          </div>

                        </td>

                      </tr>  

                    <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end table data product -->

          </div>
              <!-- end table data product -->
          </div>
          <!-- / Content -->
        <?php require "inc/footer.php"; ?>