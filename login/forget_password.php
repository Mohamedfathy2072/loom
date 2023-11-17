<?php 
	$titlePage = "هل نسيت كلمة المرور";
	require "../inc/asset/login_header.php";

    session_start();
    if(isset($_SESSION['email_member']) && isset($_SESSION['password_member']) && isset($_SESSION['id'])){
		header("location: ../page/acc.php");
		exit;
	}

    require "../inc/config/db.php";
    
    if(isset($_POST['reset'])){
        $email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);

        if(empty($email) || !isset($email)){
            echo "<script>alert('رجاء املاء البريد الالكتروني بشكل صحيح');</script>";
        }else{

            // check email isset or no
            $checkEmail = $conn->prepare("SELECT * FROM member WHERE email = :email");
            $checkEmail->bindParam("email",$email);
            $checkEmail->execute();

            if($checkEmail->rowCount() == 1){
                
                $info_user = $checkEmail->fetchObject();
                $code = rand(0,9999999);

                @$reset_user = $conn->prepare("INSERT INTO forget_passowrd(Email,code,date,status_url,user_id) VALUES(:Email,:code,:date,'false',:user_id)");
                @$reset_user->bindParam("Email",$info_user->email);
                @$reset_user->bindParam("code",$code);
                @$reset_user->bindParam("date",date("Y-m-d"));
                @$reset_user->bindParam("user_id",$info_user->id);
                @$reset_user->execute();

                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
						<div class="m-auto cairo">
                            أرسلنا لك إيميل يحتوي على رابط لإعادة تعيين كلمة المرور، برجاء التحقق من إيميلاتك الواردة.
						</div>
					</div>';

                    $to = $email;
                    $name = "عزيزي";
                    $link = 'https://'.$_SERVER['HTTP_HOST'].'/login/reset_password.php?code='.$code.'&email='.$email;
                    require_once "../inc/config/mail_forget.php";

            }else{
                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="m-auto cairo">
                            البريد الالكتروني غير موجود
                        </div>
                    </div>';
            }

        }
    }
?>
	<section class="ftco-section">
		<div class="container">
			<!-- here row logo -->
			<div class="row">
				<!-- here image logo -->
				<div class="col-lg-4 mt-3">
					<a href="../">
						<img src="../assets/img/logo.png" class="img-fluid logo w-50" draggable="false">
					</a>
				</div>
			</div>
			<!-- end row logo -->
			<div class="row justify-content-center mt-5">
				<div class="col-md-5 text-right">
					<h3 class="heading-section cairo fw-bold">هل نسيت كلمة المرور ؟</h3>
                    <h6 class="cairo mt-2 mb-5 text-secondary">هل نسيت كلمة المرور ادخل البريد الالكتروني الخاص لحسابك لاسترجاعها</h6>
				</div>
			</div>
			<div class="row justify-content-center">
		      					  
				 <form method="POST">

					<div class="col-lg-5 m-auto py-3">
						<div class="form-group">
							<label class="label-form cairo mb-2 fw-bold">البريد الالكتروني</label>
							<input type="email" class="form-control rounded-left cairo" autocomplete="off" placeholder="يرجي إدخال البريد الالكتروني" name="email" required>
						</div>
					</div>

					<div class="col-lg-5 m-auto mt-3">
						<div class="form-group">
							<button type="submit" class="btn btn-dark cairo w-100 submit px-5" name="reset">إرسال</button>
						</div>
					</div>

	          </form>

			</div>
		</div>
	</section>

   <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

