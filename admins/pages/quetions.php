<?php
      // here require menu or navbar right
      $pageName = "الاسئلة والتقيمات";

      require "inc/menu.php";
      
      require "../../inc/config/db.php";
      
      $data = $conn->query("SELECT * FROM contact ORDER BY id DESC");
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                    الاسئلة والتقيمات
                </h5>
                <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>الاسم الكامل</th>
                        <th>البريد الكتروني</th>
                        <th>العنوان</th>
                        <th>الاسئلة</th>
                        <th></th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php foreach($data AS $show): ?>
                      <tr>
                        <td><strong><?php echo $show['full_name']; ?></strong></td>
                        
                        <td><?php echo $show['email']; ?></td>

                        <td><?php echo $show['subject']; ?></td>

                        <td style="white-space: break-spaces;overflow: hidden;max-width: 500px;"><?php echo $show['msg']; ?></td>
                        <td>
                          <?php if(!empty($_SESSION['role_delete']) && $_SESSION['role_delete'] == "الحذف"): ?>
                          <a class="text-danger ms-2" href="trash/delete_quetions.php?id=<?php echo $show['id']; ?>">
                                <i class="bx bx-trash me-1"></i>
                                الحذف
                            </a>
                          <?php endif; ?>
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