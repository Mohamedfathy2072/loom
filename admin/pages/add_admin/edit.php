<?php
     // here require menu or navbar right
     $pageName = "المشرفين";
     require_once "../inc/menu_folder.php";

    // check id and filter
    if(empty($_GET['id']) or !isset($_GET['id'])){
        header("location: categorys.php",true);
        exit;
    }else{
        $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
    }

    require "../../../inc/config/db.php";

    // check get id isset in database or no 
    $check = $conn->prepare("SELECT * FROM member_admin WHERE id = :id");
    $check->bindParam("id",$id);
    $check->execute();
    if($check->rowCount() != 1){
        header("location: admins.php",true);
        exit;
    }else{
        $check = $check->fetchObject();
    }


    // here form
    try{
        // هنا تحقق وارسال الفورم
        if(isset($_POST['save'])):
            // فلتر بيانات
            $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            
            // تحقق من معلومات الصلاحيات
            if(empty($_POST['role_add'])){
                $role_add = "";
            }else{
                $role_add = filter_var($_POST['role_add'],FILTER_SANITIZE_STRING);
            }
            
            if(empty($_POST['role_edit'])){
                $role_edit = "";
            }else{
                $role_edit = filter_var($_POST['role_edit'],FILTER_SANITIZE_STRING);
            }
            
            if(empty($_POST['role_delete'])){
                $role_delete = "";
            }
            else{
                $role_delete = filter_var($_POST['role_delete'],FILTER_SANITIZE_STRING);
            }
            

            if(empty($username) || empty($email) || empty($password) || empty($role_add) && empty($role_edit) && empty($role_delete)):
               echo "<script>
                        alert('رجاء لا ترسل بيانات فارغة');
                </script>";
            else:
                $password = md5($password);
                $submit = $conn->prepare("UPDATE member_admin SET username = :username,email = :email,password = :password,role_add = :role_add,role_edit = :role_edit,role_delete = :role_delete WHERE id = :id");
                $submit->bindParam("username",$username);
                $submit->bindParam("email",$email);
                $submit->bindParam("password",$password);
                $submit->bindParam("role_add",$role_add);
                $submit->bindParam("role_edit",$role_edit);
                $submit->bindParam("role_delete",$role_delete);
                $submit->bindParam("id",$id);
                if($submit->execute()):
                    echo "<script>
                        alert('تم تعديل المشرف بنجاح');
                        document.location = 'admins.php';
                    </script>";
                endif;
            endif;
          
        endif;
    }catch (PDOException $e) {
        echo "<script>alert('الاسم المستخدم موجود من قبل');</script>";
    }

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
                        <h5 class="mb-0">اضافة المشرف</h5>
                      </div>
                      <div class="card-body">
                        <!-- here form add admins -->
                        <form method="POST">

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">الاسم المستخدم</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="basic-default-name" placeholder="name2232" name="username" value="<?php echo $check->username; ?>" required>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">البريد الكتروني</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="basic-default-email" placeholder="info@name.com" name="email" value="<?php echo $check->email; ?>" required>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-password">كلمة السر</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="basic-default-password" placeholder="كلمة السر" name="password" required>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-password">الصلاحيات</label>
                            <div class="col-sm-10">
                                <?php 
                                    $role_adding = $check->role_add;
                                    $role_editing = $check->role_edit;
                                    $role_deleteing = $check->role_delete;
                                    ?>
                                <label class="text-primary">الاضافة</label>
                                <?php if($role_adding == "الاضافة"): ?>
                                <input type="checkbox" value="الاضافة" class="form-check-input" name="role_add" checked>        
                                <?php else: ?>
                                <input type="checkbox" value="الاضافة" class="form-check-input" name="role_add"> 
                                <?php endif; ?>       
                                <br>

                                <label class="text-warning">التعديل</label>
                                <?php if($role_editing == "التعديل"): ?>
                                <input type="checkbox" value="التعديل" class="form-check-input" name="role_edit" checked>
                                <?php else: ?>
                                <input type="checkbox" value="التعديل" class="form-check-input" name="role_edit">
                                <?php endif; ?>
                                <br>
                                
                                <label class="text-danger">الحذف</label>
                                <?php if($role_deleteing == "الحذف"): ?>
                                <input type="checkbox" value="الحذف" class="form-check-input" name="role_delete" checked>
                                <?php else: ?>
                                <input type="checkbox" value="الحذف" class="form-check-input" name="role_delete">
                                <?php endif; ?>
                            </div>
                          </div>
                          
                          <div class="row justify-content-end">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-dark" name="save">الاضافة</button>
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

        <?php require "../inc/footer_folder.php"; ?>