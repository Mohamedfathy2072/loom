<?php
    // here require menu or navbar right
    $pageName = "المنتجات";
    require_once "../inc/menu_folder.php";
  
    // require database
    require "../../../inc/config/db.php";
    
    $data = $conn->query("SELECT * FROM category");
?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    <a href="add.php" class="btn btn-warning text-dark">
                        الاضافة
                    </a>
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>ألاسم التصنيف</th>
                        <th>الصورة التصنيف</th>
                        <th></th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php 
                        foreach($data AS $show):
                          $image = '../../../'.$show['image_file']; 
                      ?>
                      <tr>
                        <td><?php echo $show['id']; ?></td>

                        <td>
                          <?php echo $show['Title']; ?>
                        </td>

                        <td>
                          <img src="<?php echo $image; ?>" width="75px"height="65px">
                        </td>

                        <td>
                            <a class="text-info ms-2" href="edit.php?id=<?php echo $show['id']; ?>">
                                <i class="bx bx-edit me-1"></i>
                                ألتعديل
                            </a>
                            <a class="text-danger ms-2" href="delete.php?id=<?php echo $show['id']; ?>">
                                <i class="bx bx-trash me-1"></i>
                                الحذف
                            </a>
                        </td>
                      <?php endforeach; ?>
                      </tr>   
                      
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- end table data product -->
          </div>
          <!-- / Content -->

        <?php require "../inc/footer_folder.php"; ?>