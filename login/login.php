<?php 
	$titlePage = "تسجيل الدخول";
	require "../inc/asset/login_header.php";

	session_start();

	if(isset($_SESSION['email_member']) && isset($_SESSION['password_member']) && isset($_SESSION['id'])){
		header("location: ../page/acc.php");
		exit;
	}
	// include file config
	require_once "../inc/config/db.php";

	if(isset($_POST['login'])):

		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$pass = $_POST['password'];

		if(empty($email) || empty($pass)){
			echo "<script>alert('رجاء املاء بيانات بشكل صحيح');</script>";
		}else{
			$pass = md5($pass);

			// login and create session
			$login = $conn->prepare("SELECT * FROM member WHERE email = :email AND password = :password");
			$login->bindParam("email",$email);
			$login->bindParam("password",$pass);
			$login->execute();

			if($login->rowCount() == 1){


				$logincheck = $conn->prepare("SELECT * FROM member WHERE email = :email AND password = :password AND status = 'yes'");
				$logincheck->bindParam("email",$email);
				$logincheck->bindParam("password",$pass);
				$logincheck->execute();

				if($logincheck->rowCount() == 1){
					$logincheck = $logincheck->fetchObject();

					// create session
					$_SESSION['id'] = $logincheck->id;
					$_SESSION['first_name'] = $logincheck->first_name;
					$_SESSION['last_name'] = $logincheck->last_name;
					$_SESSION['phone_number'] = $logincheck->phone_number;

					$_SESSION['email_member'] = $email;
					$_SESSION['password_member'] = $pass;

					header("location: ../index.php",true);
					exit;

				}else{
					echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
						<div class="m-auto cairo">
							رجاء تحقق من البريد الالكتروني لتفعيل حساب
						</div>
					</div>';

					$logincheck = $logincheck->fetchObject();

					// send massgess confirm with email
					$to = $email;
					$name = $logincheck->first_name;
					$link = $_SERVER['HTTP_HOST'].'/page/verifyAccount?code='.$logincheck->code;
					require_once "../inc/config/mail.php";
					// end send massegess
					header("refresh:10;url=login3.php",true);
				}

			}else{
				echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					</svg>
					<div class="m-auto cairo">
						البريد الالكتروني او كلمة المرور خطأ
					</div>
				</div>';
			}
		}

	endif;
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
					<h1 class="heading-section cairo title-page fw-bold">هلا مرحبا بك !</h1>
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

					<div class="col-lg-5 m-auto py-3">
						<div class="form-group">
							<label class="label-form cairo mb-2 fw-bold">كلمة المرور</label>
							<input type="password" class="form-control rounded-left cairo" autocomplete="off" placeholder="يرجي إدخال كلمة المرور" name="password" required>
						</div>
					</div>

					<div class="col-lg-5 m-auto py-3">
						<div class="text-md-right">
							<a href="forget_password.php" class="text-dark text-decoration-none cairo fw-bold">هل نسيت كلمة المرور ؟</a>
						</div>
					</div>

					<div class="col-lg-5 m-auto">
						<div class="form-group">
							<button type="submit" class="btn btn-dark cairo w-100 submit px-5" name="login">تسجيل الدخول</button>
						</div>
					</div>

					<div class="col-lg-5 m-auto py-3">
						<div class="text-md-right">
							<span class="cairo text-secondary">ليس لديك حساب؟<a href="singup.php" class="text-dark text-decoration-none cairo fw-bold">اشترك الان</a></span>
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

