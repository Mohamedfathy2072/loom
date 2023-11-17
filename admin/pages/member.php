<?php
      // here require menu or navbar right
      $pageName = "العملاء";
      require "inc/menu.php";

      require "../../inc/config/db.php";

      $member = $conn->query("SELECT * FROM member ORDER BY id DESC");
    ?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- start table data product here -->
            <div class="card">
                <h5 class="card-header">
                  العملاء
                  
                  <form class="mt-5 d-flex" method="GET">
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="basic-default-search" placeholder="البحث باسم العميل,البريد الكتروني" name="search">
                      </div>
                      <div class="col-sm-2 me-2">
                        <button type="submit" class="btn btn-dark" name="btn_search">
                            <i class='bx bx-search'></i>
                        </button>
                      </div>
                  </form>

                </h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>

                      <tr>
                        <th>اسم العميل</th>
                        <th>البريد الالكتروني</th>
                        <th>رقم هاتف</th>
                        <th>الجنس</th>
                        <th>لغة التواصل</th>
                        <th>حالة الحساب</th>
                        <th>اعدادات العميل</th>
                      </tr>

                    </thead>

                    <tbody class="table-border-bottom-0">

                    <?php 
                    // search in data
                          if(isset($_GET['btn_search'])):

                            $search_input = filter_var($_GET['search'],FILTER_SANITIZE_STRING);
                            $searching = "%".$search_input."%";

                            $search = $conn->prepare("SELECT * FROM `member` WHERE email LIKE :search OR first_name LIKE :search");
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
                            foreach($search AS $show):
                        ?>

                        <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show['first_name']." ".$show['last_name']; ?></strong></td>
                        <td><?php echo $show['email']; ?></td>

                        <td>
                          <?php echo $show['phone_number']; ?>
                        </td>

                        <td>
                          <?php echo $show['gender']; ?>
                        </td>

                        <td>
                          <?php echo $show['lang']; ?>
                        </td>

                        <td>
                          <?php 
                              if($show['status'] == "yes"){
                                echo '<i class="text-primary bx bxs-user-check me-1"></i>';
                              }else{
                                echo "<i class='text-danger bx bx-user-x' ></i>";
                              } 
                          ?>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="edit_member.php?id=<?php echo $show['id']; ?>"><i class="bx bx-edit me-1"></i>تعديل معلومات</a>
                              <a class="dropdown-item text-warning" href="edit_pass_member.php?id=<?php echo $show['id']; ?>"><i class="bx bxs-lock-alt me-1"></i>تعديل كلمة المرور</a>
                              <a class="dropdown-item text-danger" href="trash/delete_member.php?id=<?php echo $show['id']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
                            </div>
                          </div>
                        </td>

                      </tr> 
                      <?php endforeach; ?>

                    <?php 
                        endif;
                        // if not click button search
                        else:
                         foreach($member AS $show): ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $show['first_name']." ".$show['last_name']; ?></strong></td>
                        <td><?php echo $show['email']; ?></td>

                        <td>
                          <?php echo $show['phone_number']; ?>
                        </td>

                        
                        <td>
                          <?php echo $show['gender']; ?>
                        </td>

                        <td>
                          <?php echo $show['lang']; ?>
                        </td>

                        <td>
                          <?php 
                              if($show['status'] == "yes"){
                                echo '<i class="text-primary bx bxs-user-check me-1"></i>';
                              }else{
                                echo "<i class='text-danger bx bx-user-x' ></i>";
                              } 
                          ?>
                        </td>

                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="text-align: right;">
                              <a class="dropdown-item text-primary" href="edit_member.php?id=<?php echo $show['id']; ?>"><i class="bx bx-edit me-1"></i>تعديل معلومات</a>
                              <a class="dropdown-item text-warning" href="edit_pass_member.php?id=<?php echo $show['id']; ?>"><i class="bx bxs-lock-alt me-1"></i>تعديل كلمة المرور</a>
                              <a class="dropdown-item text-danger" href="trash/delete_member.php?id=<?php echo $show['id']; ?>"><i class="bx bx-trash me-1"></i>الحذف</a>
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