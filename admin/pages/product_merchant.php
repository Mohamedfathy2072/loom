<?php
        // check get id
        if(empty($_GET['id']) or !isset($_GET['id'])){
            header("location: merchant.php",true);
            exit;
        }else{
            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        }

      // here require menu or navbar right
      $pageName = "نظام بائعين";
      require "inc/menu.php";
     // here include db connect
     require "../../inc/config/db.php";

     // هنا نحقق هل هذا اي دي موجود ام لا
     $check_id = $conn->prepare("SELECT * FROM signup_merchant INNER JOIN member ON signup_merchant.id_user = member.id WHERE signup_merchant.ID = :id AND status_merchants = 'مفعل'");
     $check_id->bindParam("id",$id);
     $check_id->execute();
     // تحقق من اي دي سطر واحد موجود او اكثر
     if($check_id->rowCount() != 1){
       echo "<script>document.location = 'merchant.php';</script>";
       exit;
     }else{
       $get_data = $check_id->fetchObject();

       $data = $conn->prepare("SELECT * FROM `product_merchant` INNER JOIN category ON product_merchant.category = category.id WHERE id_user = :id_user ORDER BY product_merchant.ID DESC");
       $data->bindParam("id_user",$get_data->id_user);
       $data->execute();
     }

   ?>

       <!-- Content wrapper -->
       <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    منتجات <?php echo $get_data->last_name ." ".$get_data->first_name; ?>
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>عنوان المنتج</th>
                        <th>التصنيف</th>
                        <th>الصورة</th>
                        <th>السعر</th>
                        <th>حالة</th>
                        <th>اعدادت المنتج</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php 
                        foreach($data AS $show_data):
                          $image = '../../'.$show_data['img_file']; 
                    ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show_data['title']; ?></strong></td>
                        <td><?php echo $show_data['Title']; ?></td>

                        <td>
                          <img src="<?php echo $image; ?>" class="img-fluid" style="width: 70px;height:50px">
                        </td>

                        <td>
                            <span class="badge bg-label-dark me-1">ر.س <?php echo $show_data['price']; ?></span>
                        </td>

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
                              <a class="dropdown-item text-primary" href="../../page/test_view.php?id=<?php echo $show_data['ID']; ?>"><i class='bx bxs-message-rounded-error'></i>مشاهدت المنتج</a>
                              <a class="dropdown-item text-success" href="merchant/sucsse_product.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-check me-1"></i>قبول</a>
                              <a class="dropdown-item text-warning" href="merchant/close_product.php?id=<?php echo $show_data['ID']; ?>"><i class='bx bxs-x-circle me-1'></i>رفض</a>
                              <a class="dropdown-item text-danger" href="merchant/delete_product.php?id=<?php echo $show_data['ID']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
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
        <?php require "inc/footer.php"; ?>