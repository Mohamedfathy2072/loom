<?php
    // here require menu or navbar right
    $pageName = "المشرفين";
    require_once "../inc/menu_folder.php";
  
    // require database
    require "../../../inc/config/db.php";

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
                $submit = $conn->prepare("INSERT INTO member_admin(username,email,password,role_add,role_edit,role_delete) VALUES(:username,:email,:password,:role_add,:role_edit,:role_delete)");
                $submit->bindParam("username",$username);
                $submit->bindParam("email",$email);
                $submit->bindParam("password",$password);
                $submit->bindParam("role_add",$role_add);
                $submit->bindParam("role_edit",$role_edit);
                $submit->bindParam("role_delete",$role_delete);
                if($submit->execute()):
                    echo "<script>
                        alert('تم اضافة المشرف بنجاح');
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
                              <input type="text" class="form-control" id="basic-default-name" placeholder="name2232" name="username" required>
                            </div>
                          </div>

                          <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">البريد الكتروني</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="basic-default-email" placeholder="info@name.com" name="email" required>
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
                                <label class="text-primary">الاضافة</label>
                                <input type="checkbox" value="الاضافة" class="form-check-input" name="role_add">        
                                <br>
                                <label class="text-warning">التعديل</label>
                                <input type="checkbox" value="التعديل" class="form-check-input" name="role_edit">
                                <br>
                                <label class="text-danger">الحذف</label>
                                <input type="checkbox" value="الحذف" class="form-check-input" name="role_delete">
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