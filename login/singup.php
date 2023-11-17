<?php 
	$titlePage = "انشاء الحساب";
	require_once "../inc/asset/login_header.php";
	
	session_start();

	if(isset($_SESSION['email_member']) && isset($_SESSION['password_member']) && isset($_SESSION['id'])){
		header("location: ../page/acc.php");
		exit;
	}

	// include file config
	require_once "../inc/config/db.php";

	// insert data
	if(isset($_POST['submit'])):
		// if method request = post
		if($_SERVER['REQUEST_METHOD'] == "POST"):
			// here filter data
			$firstName = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
			$lastName = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
			$phone = filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRIPPED);
			$password = $_POST['password'];
			$random = rand(0,9999999);

			// here filter data with input radio
			if($_POST['gender'] == 1){
				$gender = "ذكر";
			}
			elseif($_POST['gender'] == 2){
				$gender = "أنثى";
			}else{
				$gender = null;
			}

			if($_POST['lang'] == 2){
				$lang = "الإنجليزية";
			}else{
				$lang = "العربية";
			}

			// here check data nut null
			if(empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password) || empty($gender)){
				echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
					<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
					</svg>
					<div class="m-auto cairo">
					رجاء لاترسل بيانات فارغة
					</div>
				</div>';
			}else if(empty($_POST['privcy']) || $_POST['privcy'] != "accept"){
				echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
						<div class="m-auto cairo">
							يجب تلتزم بالشروط وقوانين حتى تنشاء حساب في لوم
						</div>
					</div>';
			}else{
				// transform password with encripyt md5
				$password = md5($password);
				try{
					// insert user with database
					$adduser = $conn->prepare("INSERT INTO member(first_name,last_name,email,phone_number,gender,lang,password,code,status) VALUES(:first_name,:last_name,:email,:phone_number,:gender,:lang,:password,:code,'no')");
					$adduser->bindParam("first_name",$firstName);
					$adduser->bindParam("last_name",$lastName);
					$adduser->bindParam("email",$email);
					$adduser->bindParam("phone_number",$phone);
					$adduser->bindParam("gender",$gender);
					$adduser->bindParam("lang",$lang);
					$adduser->bindParam("password",$password);
					$adduser->bindParam("code",$random);
					// if secssfuly add
					if($adduser->execute()){
						echo '<div class="alert alert-success d-flex align-items-center" role="alert">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
								</svg>
								<div class="m-auto cairo">
									تم انشاء الحساب بنجاح
								</div>
							</div>';
							// send massgess confirm with email
							$to = $email;
							$name = $firstName;
							$link = "https://".$_SERVER['HTTP_HOST'].'/login/verifyAccount.php?code='.$random;
							require_once "../inc/config/mail.php";
							// end send massegess
							header("refresh:7;url=login3.php",true);
					}
				}catch(Exception $error){
					echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
						<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</svg>
						<div class="m-auto cairo">
							بريد الالكتروني موجود من قبل رجاء ادخل بريد الالكتروني غير موجود
						</div>
					</div>';
				}
			}
		endif;
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

        <div class="row justify-content-center mt-4">
            <div class="col-md-6 text-center mb-5">
                <h3 class="heading-section cairo">سعيدين بوجودك معنا</h3>
				<h6 class="heading-section cairo  text-secondary">تسجيل الحساب</h6>
			</div>
        </div>

			<form method="POST" class="row justify-content-center">

				<div class="col-lg-4 py-3">
					<div class="form-group">
						<input type="text" class="w-100 cairo" autocomplete="off" placeholder="الاسم الأول" name="firstname" required>
					</div>
				</div>

				<div class="col-lg-4 py-3">
					<div class="form-group">
						<input type="text" class="w-100 cairo" autocomplete="off" placeholder="اسم العائلة" name="lastname" required>
					</div>
				</div>

				<div class="col-lg-8 py-3">
					<div class="form-group">
						<input type="email" class="w-100 cairo" autocomplete="off" placeholder="البريد الالكتروني" name="email" required>
					</div>
				</div>

				<div class="col-lg-8 py-3 d-flex">
					<img src="../assets/img/icons/flag-sa.png" class="img-fluid flag-saudia">
					<span class="ms-3">+966</span>
					<div class="form-group w-100">
						<input type="number" class="w-100 cairo" autocomplete="off" placeholder="رقم الهاتف" name="phonenumber" required>
					</div>
				</div>

				<div class="col-lg-8 py-3">
					<div class="form-group d-flex">
						<input type="password" class="w-100 cairo" autocomplete="off" placeholder="كلمة المرور" name="password" required>
					</div>
				</div>

				<div class="col-lg-8 py-3">
					<span class="cairo text-secondary">الجنس</span>
					<!-- here input -->
					<div class="d-flex mt-2">
						<div class="form-check">
							<input class="form-check-input mt-2" type="radio" name="gender" id="flexRadioDefault1" value="1" checked>
						</div>

						<span class="me-2 ms-5" style="width: 100px;height: 40px;">
							<img src="../assets/img/icons/male.svg">
						</span>

						<div class="form-check">
							<input class="form-check-input mt-2" type="radio" name="gender" id="flexRadioDefault2" value="2">
						</div>

						<span class="me-2" style="width: 110px;height: 40px;">
							<img src="../assets/img/icons/famale.svg">
						</span>
					</div>

				</div>

				<div class="col-lg-8 py-3 mb-5">
					<span class="cairo text-secondary">لغة التواصل</span>
					<!-- here input -->
					<div class="d-flex mt-2 me-3">

						<div class="form-check ms-5">
							<input class="form-check-input mt-2" type="radio" name="lang" id="flexRadioDefault3" value="1" checked>
							<label class="form-check-label cairo" for="flexRadioDefault3">
								العربية	
							</label>
						</div>

						<div class="form-check">
							<input class="form-check-input mt-2" type="radio" name="lang" id="flexRadioDefault4" value="2">
							<label class="form-check-label cairo" for="flexRadioDefault4">
								الإنجليزية
							</label>
						</div>

					</div>

				</div>

				<div class="form-group d-flex text-center">

					<div class="w-100">
						<input type="checkbox" name="privcy" value="accept" checked>
						<span class="checkmark"></span>
						<label class="checkbox-wrap checkbox-primary text-dark cairo">موافقة على
							<a href="#" class="text-primary"> الشروط</a>
						</label>
					</div>

					<div class="w-100 text-center">
						<a href="login.php" class="cairo text-dark">هل لديك حساب بالفعل؟</a>
					</div>

				</div>
				

				<div class="col-lg-8 mb-5">
					<div class="form-group">
						<button type="submit" class="w-100 btn btn-dark cairo rounded mt-3" name="submit">
							تسجيل الحساب
						</button>
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