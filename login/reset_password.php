<?php
    $titlePage = "الاعادة تعين كلمة المرور";
    require_once "../inc/asset/login_header.php";
    
    if(!isset($_GET['code']) || empty($_GET['code']) || !isset($_GET['email']) || empty($_GET['email'])){
        header("location: login3.php",true);
        exit;
    }else{
        $code = filter_var($_GET['code'],FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_GET['email'],FILTER_SANITIZE_EMAIL);
    }

    require "../inc/config/db.php";

    // check code and email
    $check = $conn->prepare("SELECT * FROM forget_passowrd WHERE code = :code AND Email = :email ORDER BY Id DESC LIMIT 1 OFFSET 0");
    $check->bindParam("code",$code);
    $check->bindParam("email",$email);
    $check->execute();

    if($check->rowCount() == 1){
        $info = $check->fetchObject();
        $id_member = $info->user_id;

        // if url on other days not work
        if(date("Y-m-d") == $info->date && $info->status_url == "false"){

            // here reset password
            if(isset($_POST['reset'])){
                $password = $_POST['password'];
                // check is not null
                if(!empty($password)){
                    $password = md5($password);
                    
                    $update = $conn->prepare("UPDATE member SET password=:password WHERE id = :id");
                    $update->bindParam("password",$password);
                    $update->bindParam("id",$id_member);
                    if($update->execute()){

                        $status = $conn->prepare("UPDATE forget_passowrd SET status_url = 'true' WHERE email = :email AND code = :code");
                        $status->bindParam("email",$email);
                        $status->bindParam("code",$code);
                        $status->execute();

                        echo "<script>
                                    alert('تم تعين كلمة المرور جديدة');
                                    document.location = 'login3.php';
                                </script>";
                        exit;
                    }


                }else{
                    echo "<script>alert('رجاء املاء كلمة المرور بشكل صحيح');</script>";
                }
            }

    }else{
        echo "<script>
                document.location = '../index.php';
            </script>";   
        exit;
    }

    }else{
        header("location: login3.php",true);
        exit;
    }
?>

<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section cairo">الاعادة تعين كلمة المرور</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
                
                <p class="text-center mb-4 cairo">
                    ادنا اكتب كلمة المرور الجديد
                </p>
				  
				 <form method="POST" class="login-form">

					<div class="form-group">
						<input type="password" class="form-control rounded-left" placeholder="كلمة المرور جديدة" name="password" required>
					</div>

					<div class="form-group mt-5">
						<button type="submit" class="btn btn-warning cairo rounded submit" name="reset">اعادة تعين كلمة المرور</button>
					</div>

	          </form>
	        </div>
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