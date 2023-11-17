<?php 
	$titlePage = "التوظيف";
	require_once "../inc/asset/login_header.php";
	// include file config
	require_once "../inc/config/db.php";

	// insert data
	if(isset($_POST['submit'])):

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
		}
	endif;

?>
<section class="ftco-section">
    <div class="container">

		<div class="row">
			<div class="col-lg-8 mt-3">
				<img src="../assets/img/logo.png" class="img-fluid w-25">
			</div>
		</div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6 text-center mb-5">
                <h3 class="heading-section cairo">مرحبًا بك في فريقنا ونرحب بك دائمآ</h3>
				<h6 class="heading-section cairo  text-secondary">يرجى تعبئة البيانات الشخصية و إرفاق السيرة الذاتية ليتم رفع طلب التوظيف </h6>
			</div>
        </div>

			<form method="POST" class="row justify-content-center">

				<div class="col-lg-8 py-3">
					<div class="form-group">
						<input type="text" class="w-100 cairo" autocomplete="off" placeholder="الاسم الرباعي" name="firstname" required>
					</div>
				</div>
                
				<div class="col-lg-8 py-3 d-flex">
					<img src="<?= $url_automatics; ?>/assets/img/icons/flag-sa.png" class="img-fluid flag-saudia">
					<span class="ms-3">+966</span>
					<div class="form-group w-100">
						<input type="number" class="w-100 cairo" autocomplete="off" placeholder="رقم التواصل" name="phonenumber" required>
					</div>
				</div>

                
				<div class="col-lg-8 py-3 d-flex">
					<div class="form-group w-100">
						<input type="number" class="w-100 cairo" autocomplete="off" placeholder="رقم تواصل اخر اذا وجد" name="phonenumber">
					</div>
				</div>

				<div class="col-lg-8 py-3">
					<div class="form-group">
						<input type="email" class="w-100 cairo" autocomplete="off" placeholder="البريد الالكتروني" name="email" required>
					</div>
				</div>


				<div class="col-lg-8 py-3">
					<div class="form-group">
                        <select class="form-select cairo border-top-0 border-end-0 border-start-0 border-bottom-1">
                            <option selected disabled>أختر المهارة الوظيفية المناسبة لك </option>
                            <option value="1">فریق المنتجات والطلبات</option>
                            <option value="2">المالیة والمحاسبة</option>
                            <option value="3">إدارة العملاء والبائعین</option>
                            <option value="4">فريق المشرفين</option>
                            <option value="5">أمن المعلومات</option>
                            <option value="5">الأمن السيبرني</option>
                            <option value="6">التسویق</option>
                            <option value="7">الأبحاث والتطویر</option>
                            <option value="8">خدمة العملاء والبائعین </option>
                        </select>
					</div>
				</div>

                
				<div class="col-lg-8 py-3">
					<div class="form-group">
                        <label for="formFile" class="form-label cairo">مرفق السيرة الذاتية PDF</label>
						<input type="file" class="w-100 cairo form-control" id="formFile" autocomplete="off" name="file" required>
					</div>
				</div>
                
				<div class="col-lg-8 py-3">
                <div class="form-floating mb-3 cairo">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ملاحظة">
                    <label for="floatingInput" style="right: 0;left: 90%">ملاحظات</label>
                </div>
				</div>


				<div class="col-lg-8 mb-5">
					<div class="form-group">
						<button type="submit" class="w-100 btn btn-dark cairo rounded mt-3" name="submit">
							أرسال
						</button>
					</div>
				</div>

			</form>
        </div>
    </div>
</section>


<script src="<?= $url_automatics; ?>/login/js/jquery.min.js"></script>
<script src="<?= $url_automatics; ?>/login/js/popper.js"></script>
<script src="<?= $url_automatics; ?>/login/js/bootstrap.min.js"></script>
<script src="<?= $url_automatics; ?>/login/js/main.js"></script>

</body> 
</html>