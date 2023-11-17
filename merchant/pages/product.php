<?php
      // here require menu or navbar right
      $pageName = "المنتجات";

      require "inc/menu.php";
      
      // include database
      require "../../inc/config/db.php";
      // require check member is merchant or no
      require "inc/check_member.php";

      
      $data = $conn->prepare("SELECT * FROM `product_merchant` INNER JOIN category ON product_merchant.category = category.id WHERE id_user = :id ORDER BY product_merchant.ID DESC");
      $data->bindParam("id",$_SESSION['id']);
      $data->execute();
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    <a href="addproduct.php" class="btn btn-primary">
                        اضافة منتج
                    </a>
                </h5>

                <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>عنوان المنتج</th>
                        <th>التصنيف</th>
                        <th>الكمية المتبقية</th>
                        <th>الصورة</th>
                        <th>السعر</th>
                        <th>السعر بعد الخصم</th>
                        <th>ضمان المنتج</th>
                        <th>رقم تسلسلي</th>
                        <th>حالة</th>
                        <th>اعدادت المنتج</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php 
                        foreach($data AS $show_data):
                          $image = "data:" . $show_data['img_type'] . ";base64," . base64_encode($show_data['img_file']); 
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show_data['title']; ?></strong></td>
                        <td><?php echo $show_data['Title']; ?></td>

                        <td><?php echo $show_data['quantity']; ?></td>

                        <td>
                          <img src="<?php echo $image; ?>" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-primary me-1">ر.س <?php echo $show_data['price']; ?></span>
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">ر.س <?php echo $show_data['price_coupon']; ?></span>
                        </td>

                        <td><?php echo $show_data['grenti']; ?></td>

                        <td><?php echo $show_data['generate_code']; ?></td>

                        <td>
                            <?php if($show_data['status_product'] == 'تم قبول'){ ?>
                            <span class="badge bg-label-success me-1"><?php echo $show_data['status_product']; ?></span>
                            <?php }else if($show_data['status_product'] == 'مرفوض'){ ?>
                            <span class="badge bg-label-danger me-1"><?php echo $show_data['status_product']; ?></span>
                            <?php }else{ ?>
                            <span class="badge bg-label-warning me-1"><?php echo $show_data['status_product']; ?></span>
                            <?php } ?>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-dark" href="../../page/test_view.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bxs-binoculars me-1"></i>مشاهدت المنتج</a>
                              <a class="dropdown-item text-primary" href="edit_product.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-edit-alt me-1"></i>تعديل</a>
                              <a class="dropdown-item text-warning" href="edit_img_product.php?id=<?php echo $show_data['ID']; ?>"><i class='bx bx-images'></i> تعديل الصورة</a>
                              <a class="dropdown-item text-danger" href="trash/delete_produt.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
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
          <!-- / Content -->

          <?php require 'inc/footer.php'; ?>