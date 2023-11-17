<?php
     // here require menu or navbar right
     $pageName = "المشرفين";
     require_once "../inc/menu_folder.php";
    
    // require database
    require "../../../inc/config/db.php";
    
    $data = $conn->query("SELECT * FROM member_admin");

?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    <a href="add.php" class="btn btn-dark">
                        اضافة المشرف
                    </a>
                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>#</th>
                        <th>اسم المستخدم</th>
                        <th>البريد الالكتروني</th>
                        <th>الصلاحيات</th>
                        <th></th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php foreach($data AS $show): ?>
                      <tr>
                        <td><?php echo $show['id']; ?></td>

                        <td>
                          <?php echo $show['username']; ?>
                        </td>
                        <td>
                          <?php echo $show['email']; ?>
                        </td>
                        <td>
                          <?php 
                              echo $show['role_add'] . "  &nbsp; &nbsp;" .
                                  $show['role_edit'] . "  &nbsp; &nbsp;" . 
                                  $show['role_delete']; 
                            ?>
                        </td>

                        <td>
                            <a class="text-warning ms-2" href="edit.php?id=<?php echo $show['id']; ?>">
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