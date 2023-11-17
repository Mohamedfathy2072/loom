<?php
    $titlePage = "تفعيل الحساب";
    require_once "../inc/asset/login_header.php";

    if(!isset($_GET['code']) || empty($_GET['code'])){
        header("location: singup.php",true);
        exit;
    }else{
        $code = filter_var($_GET['code'],FILTER_SANITIZE_NUMBER_INT);
    }
    
    // include file config
    require_once "../inc/config/db.php";
    // check with code url
    $check = $conn->prepare("SELECT * FROM member WHERE code = :code");
    $check->bindParam("code",$code);
    $check->execute();
    if($check->rowCount() != 0){
        // check if status eqluis yes
        $checkStatus = $conn->prepare("SELECT * FROM member WHERE code = :code AND status = 'yes'");
        $checkStatus->bindParam("code",$code);
        $checkStatus->execute();
        if($checkStatus->rowCount() == 1){
            header("location:login3.php",true);
            exit;
        }
        
        // update status and confirm account
        $confirm = $conn->prepare("UPDATE member SET status = 'yes' WHERE code = :code");
        $confirm->bindParam("code",$code);
        if($confirm->execute()){
            header("refresh:10;url=login3.php",true);
        }

    }else{
        header("location: singup.php",true);
        exit;
    }
?>

<section>

    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        <div class="m-auto cairo">
            تم تفعيل الحساب بنجاح
        </div>
    </div>

    <div class="container mt-5">
        <div class="row py-5">
            <div class="col-lg-12 justify-content-center text-center">

                <a href="../">
                    <img src="../assets/img/logo.png" class="img-fluid">
                </a>

                <a href="login.php" class="btn btn-dark btn-lg cairo">
                    تسجيل الدخول
                </a>

            </div>
        </div>
    </div>

</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>


</body>

</html>