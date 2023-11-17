<?php
      // here require menu or navbar right
      $pageName = "المنتجات";

      require "inc/menu.php";
      
      // include database
      require "../../inc/config/db.php";
      $data = $conn->query("SELECT * FROM `product` INNER JOIN category ON product.category = category.id ORDER BY product.ID DESC");
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
            <?php if(!empty($_SESSION['role_add']) && $_SESSION['role_add'] == "الاضافة"): ?>
                <h5 class="card-header">
                    <a href="addproduct.php" class="btn btn-primary">
                        اضافة منتج
                    </a>
                </h5>
            <?php endif; ?>

                <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>عنوان المنتج</th>
                        <th>التصنيف</th>
                        <th>الكمية المتبقية</th>
                        <th>الصورة</th>
                        <th>السعر</th>
                        <th>السعر بعد الخصم</th>
                        <th>ضمان المنتج</th>
                        <th>رقم تسلسلي</th>
                        <th>اعدادت المنتج</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php 
                    // search in data
                          if(isset($_GET['btn_search'])):

                            $search_input = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
                            $generate_code = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
                            $searching = "%".$search_input."%";

                            $search = $conn->prepare("SELECT * FROM `product` INNER JOIN category ON product.category = category.id WHERE product.title LIKE :search OR product.generate_code = :generate_code");
                            $search->bindParam("search",$searching);
                            $search->bindParam("generate_code",$generate_code);
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
                            foreach($search AS $show_data):
                              $image = "data:" . $show_data['img_type'] . ";base64," . base64_encode($show_data['img_file']); 
                        ?>
                        <tr>
                        <td><?php echo $show_data['ID']; ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show_data['title']; ?></strong></td>
                        <td><?php echo $show_data['Title']; ?></td>
                        <td><?php echo $show_data['quantity']; ?></td>

                        <td>
                          <img src="<?php echo $image; ?>" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">ر.س <?php echo $show_data['price']; ?></span>
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">ر.س <?php echo $show_data['price_coupon']; ?></span>
                        </td>

                        <td><?php echo $show_data['grenti']; ?></td>

                        <td><?php echo $show_data['generate_code']; ?></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="edit_product.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-edit-alt me-1"></i>تعديل</a>
                              <a class="dropdown-item text-warning" href="edit_img_product.php?id=<?php echo $show_data['ID']; ?>"><i class='bx bx-images'></i> تعديل الصورة</a>
                              <a class="dropdown-item text-danger" href="trash/delete_produt.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr> 
                  <?php endforeach; ?>

                    <?php 
                        endif;
                        // if not click button search
                        else:
                        foreach($data AS $show_data):
                          $image = "data:" . $show_data['img_type'] . ";base64," . base64_encode($show_data['img_file']); 
                    ?>
                      <tr>
                        <td><?php echo $show_data['ID']; ?></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show_data['title']; ?></strong></td>
                        <td><?php echo $show_data['Title']; ?></td>
                        <td><?php echo $show_data['quantity']; ?></td>

                        <td>
                          <img src="<?php echo $image; ?>" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">ر.س <?php echo $show_data['price']; ?></span>
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">ر.س <?php echo $show_data['price_coupon']; ?></span>
                        </td>

                        <td><?php echo $show_data['grenti']; ?></td>

                        <td><?php echo $show_data['generate_code']; ?></td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="edit_product.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-edit-alt me-1"></i>تعديل</a>
                              <a class="dropdown-item text-warning" href="edit_img_product.php?id=<?php echo $show_data['ID']; ?>"><i class='bx bx-images'></i> تعديل الصورة</a>
                              <a class="dropdown-item text-danger" href="trash/delete_produt.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
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

          <?php require 'inc/footer.php'; ?>