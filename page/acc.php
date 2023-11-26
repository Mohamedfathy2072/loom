<?php
$pageName = "حسابي";
require "../inc/asset/header.php";

if(!isset($_SESSION['first_name']) || !isset($_SESSION['last_name']) || !isset($_SESSION['email_member']) || !isset($_SESSION['id'])
    || empty($_SESSION['first_name']) || empty($_SESSION['last_name']) || empty($_SESSION['email_member']) || empty($_SESSION['id'])){
    echo "<script>document.location = '../';</script>";
    exit;
}

if(isset($_POST['send'])){

    $first_name = filter_var($_POST['first_name'],FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'],FILTER_SANITIZE_STRING);
    $phone_number = filter_var($_POST['phone_number'],FILTER_SANITIZE_NUMBER_INT);

    if(empty($first_name) || empty($last_name) || empty($phone_number)){
        echo "<script>alert('رجاء لا ترسل بيانات فارغة');</script>";
    }else{
        $update = $conn->prepare("UPDATE member SET first_name = :first_name ,last_name = :last_name,phone_number = :phone_number WHERE id = :id");
        $update->bindParam("first_name",$first_name);
        $update->bindParam("last_name",$last_name);
        $update->bindParam("phone_number",$phone_number);
        $update->bindParam("id",$_SESSION['id']);
        if($update->execute()){
            $_SESSION['first_name'] = $first_name;
            $_SESSION['last_name'] = $last_name;
            $_SESSION['phone_number'] = $phone_number;
            echo "<script>
                            alert('تم تحديث المعلومات');
                            document.location = 'acc.php';
                       </script>";
        }
    }
}

// change password
if(isset($_POST['change'])){

    $pass_1 = $_POST['pass_1'];
    $pass_2 = $_POST['pass_2'];

    if(empty($pass_1) || empty($pass_2)){
        echo "<script>alert('رجاء لا ترسل بيانات فارغة');</script>";
    }else{

        $pass_1 = md5($_POST['pass_1']);
        $pass_2 = md5($_POST['pass_2']);
        if($pass_1 == $pass_2){

            $update = $conn->prepare("UPDATE member SET password = :password WHERE id = :id");
            $update->bindParam("password",$pass_1);
            $update->bindParam("id",$_SESSION['id']);

            if($update->execute()){
                $_SESSION['password_member'] = $pass_1;
                echo "<script>
                            alert('تم تحديث كلمة المرور');
                            document.location = 'acc.php';
                       </script>";
            }
        }else{
            echo "<script>alert('كلمة المرور غير متطابقتين');</script>";
        }

    }


}
/////////////////////////////////////////////
if(isset($_POST['adress'])){

    $country = $_POST['country'];
    $city = $_POST['city'];
    $area = $_POST['area'];
    $postal = $_POST['postal'];
    $international_code = $_POST['international_code'];

    if(empty($country) || empty($city) || empty($area) || empty($postal) || empty($international_code)){
        echo "<script>alert('رجاء لا ترسل بيانات فارغة');</script>";
    }else{


        $update = $conn->prepare("UPDATE member SET country = :country , city = :city , area = :area , postal_num = :postal , international_code = :international_code WHERE id = :id");
        $update->bindParam("country",$country);
        $update->bindParam("city",$city);
        $update->bindParam("area",$area);
        $update->bindParam("postal",$postal);
        $update->bindParam("international_code",$international_code);
        $update->bindParam("id",$_SESSION['id']);
        if($update->execute()){
            echo "<script>
                alert('تم تحديث كلمة المرور');
                document.location = 'acc.php';
           </script>";
        }


    }


}

?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-lg-5 order-1 mt-3">
                <h4 class="cairo">هلا <?php echo $_SESSION['first_name']; ?></h4>
                <h6 class="cairo"><?php echo $_SESSION['email_member']; ?></h6>
            </div>

            <form class="col-lg-12 m-auto order-2 mt-5 mb-5 bg-white shadow p-3 mb-5 bg-white rounded" method="POST" role="form">

                <h4 class="cairo mt-3 mb-3">معلوماتك الشخصية</h4>

                <div class="row">

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="inputText1" class="cairo">الاسم الأول</label>
                        <input type="text" class="form-control mt-1" id="inputText1" name="first_name" value="<?php echo $_SESSION['first_name']; ?>" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label  for="inputText2" class="cairo">أسم العائلة</label>
                        <input type="text" class="form-control mt-1" id="inputText2" name="last_name" value="<?php echo $_SESSION['last_name']; ?>" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label  for="inputNumber" class="cairo">رقم الهاتف</label>
                        <input type="number" class="form-control mt-1" id="inputNumber" name="phone_number" value="<?php echo $_SESSION['phone_number']; ?>" required>
                    </div>


                </div>

                <div class="row">
                    <div class="col text-end mt-2 mb-3">
                        <button type="submit" class="btn btn-dark px-3 cairo" name="send">تحديث معلومات</button>
                    </div>

                    <div class="col mt-2 text-start mb-2">
                        <a href="../login/logout.php" class="fw-bold fs-6 mt-5 cairo" style="color: red;">تسجيل الخروج</a>
                    </div>

                </div>

            </form>


            <form class="col-md-12 m-auto order-2 mt-5 mb-5 bg-white shadow p-3 mb-5 bg-white rounded" method="POST" role="form">

                <h4 class="cairo mt-3 mb-3">الحماية</h4>

                <div class="row">

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="inputEmail" class="cairo">البريد الالكتروني</label>
                        <input type="text" autocomplete="off" disabled class="form-control mt-1" id="inputEmail" name="email" value="<?php echo $_SESSION['email_member']; ?>" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="inputpassword" class="cairo">كلمة المرور الجديدة</label>
                        <input type="password" class="form-control mt-1" id="password" name="pass_1" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="inputpassword" class="cairo">اعادة كتابة كلمة المرور الجديدة</label>
                        <input type="password" class="form-control mt-1" id="password" name="pass_2" required>
                    </div>

                </div>

                <div class="row">
                    <div class="col text-end mt-2 mb-3">
                        <button type="submit" class="btn btn-dark px-3 cairo" name="change">تغير كلمة المرور</button>
                    </div>
                </div>

            </form>
            <form class="col-md-12 m-auto order-2 mt-5 mb-5 bg-white shadow p-3 mb-5 bg-white rounded" method="POST" role="form">

                <h4 class="cairo mt-3 mb-3">العنوان</h4>

                <div class="row">

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="city" class="cairo">المدينة</label>
                        <input type="text" autocomplete="off"  class="form-control mt-1" id="city" name="city" >
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="area" class="cairo">المنطقة</label>
                        <input type="text" class="form-control mt-1" id="area" name="area" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="country" class="cairo">الدولة</label>
                        <input type="text" class="form-control mt-1" id="country" name="country" required>
                    </div>

                </div>
                <div class="row">

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="inputEmail" class="cairo">الرقم البريدي</label>
                        <input type="text" autocomplete="off"  class="form-control mt-1" id="postal" name="postal" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-4 col-sm-4 mb-3">
                        <label for="inputpassword" class="cairo">الرمز الدولي</label>
                        <input type="text" class="form-control mt-1" id="international_code" name="international_code" required>
                    </div>



                </div>
                <div class="row">
                    <div class="col text-end mt-2 mb-3">
                        <button type="submit" class="btn btn-dark px-3 cairo" name="adress">اضافة</button>
                    </div>
                </div>

            </form>


        </div>
    </div>
</section>

<?php require "../inc/asset/footer.php"; ?>
<!-- Start Script -->
<script src="../assets/js/jquery-1.11.0.min.js"></script>
<script src="../assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/templatemo.js"></script>
<script src="../assets/js/fontawesome.js"></script>
<script src="../assets/js/custom.js"></script>
<!-- End Script -->
</body>

</html>