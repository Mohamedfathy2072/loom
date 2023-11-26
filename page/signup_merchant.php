<?php

$pageName = "تسجيل البائع";
require "../inc/asset/header.php";

if(!isset($_SESSION['first_name']) || !isset($_SESSION['last_name']) || !isset($_SESSION['email_member']) || !isset($_SESSION['id'])){
    echo "<script>document.location = '../login/login.php';</script>";
    exit;
}

if(!isset($_GET['dep']) || empty($_GET['dep'])):
    echo "<script>document.location = '../';</script>";
    exit;
else:
    $dep = filter_var($_GET['dep'],FILTER_SANITIZE_NUMBER_INT);
endif;


// require database
require_once "../inc/config/db.php";

$check_data = $conn->prepare("SELECT * FROM signup_merchant WHERE status_merchants = 'في الانتظار' OR status_merchants = 'مفعل' AND id_user = :id");
$check_data->bindParam("id",$_SESSION['id']);
$check_data->execute();

if($check_data->rowCount() == 1){
    echo '<div class="alert alert-success d-flex align-items-center" role="alert">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
									<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
								</svg>
								<div class="m-auto text-center cairo">
                                    تم إرسال المعلومات بنجاح في حالة قمت بتسجيل الدخول لحسابك ولم يتم تغير حسابك الى (لوحة تحكم البائع في حسابك في الاعلى) خلال 7 أيام يرجى التواصل معنا من خلال الدعم والمساعدة  في حالة تفعيل حسابك ايقونة ( هل تريد ان تصبح بائع ) سوف يتم تغيرها الى ( لوحة تحكم البائع )
								</div>
							</div>';
}else{
    try{

        // filter type
        if($dep == 1){
            $type = "الفرد";
        }elseif($dep == 2){
            $type = "المؤسسة";
        }elseif($dep == 3){
            $type = "شركة";
        }else{
            echo "<script>document.location = 'signup_merchant.php?dep=1';</script>";
            exit;
        }
        // end filter type

        // send data
        if(isset($_POST['send'])):

            // filter data
            $name_store = filter_var($_POST['name_store'],FILTER_SANITIZE_STRING);

            // check name store isset or no
            $check = $conn->prepare("SELECT * FROM signup_merchant WHERE name_store = :store");
            $check->bindParam("store",$name_store);

            $check->execute();
            if($check->rowCount() != 1){

                $commercial = filter_var($_POST['commercial'],FILTER_SANITIZE_STRING);
                $file_1_type = $_FILES['file_1']["type"];
                $file_1_img = $_FILES['file_1']['tmp_name'];
                $imageSize1 = $_FILES['file_1']['size'];
                $date = filter_var($_POST['date'],FILTER_SANITIZE_NUMBER_INT);

                $tax = filter_var($_POST['tax'],FILTER_SANITIZE_STRING);
                $file_2_type = $_FILES['file_2']["type"];
                $file_2_img = $_FILES['file_2']['tmp_name'];
                $imageSize2 = $_FILES['file_2']['size'];

                $full_name = filter_var($_POST['full_name'],FILTER_SANITIZE_STRING);
                $phone_number = filter_var($_POST['phone_number'],FILTER_SANITIZE_NUMBER_INT);
                // here file
                $person_id = filter_var($_POST['person_id'],FILTER_SANITIZE_NUMBER_INT);
                $file_3_type = $_FILES['file_3']["type"];
                $file_3_img = $_FILES['file_3']['tmp_name'];
                $imageSize3 = $_FILES['file_3']['size'];

                $file_4_type = $_FILES['file_4']["type"];
                $file_4_img = $_FILES['file_4']['tmp_name'];
                $imageSize4 = $_FILES['file_4']['size'];
                $country = $_POST['country'];
                $city = $_POST['city'];
                $area = $_POST['area'];
                $postal = $_POST['postal'];
                $international_code = $_POST['international_code'];

                // check data not empty
                if(!empty($name_store) && !empty($commercial) && !empty($file_1_type) && !empty($tax) && !empty($file_2_type)):

                    if($imageSize1 <= 40943040 && $imageSize2 <= 40943040 && $imageSize3 <= 40943040 && $imageSize4 <= 40943040):

                        // here upload file and filter with database
                        $imageType1 = filter_var($file_1_type,FILTER_SANITIZE_STRING);
                        $file_1 = file_get_contents($file_1_img);
                        // here secound files
                        $imageType2 = filter_var($file_2_type,FILTER_SANITIZE_STRING);
                        $file_2 = file_get_contents($file_2_img);
                        // here three files
                        $imageType3 = filter_var($file_3_type,FILTER_SANITIZE_STRING);
                        $file_3 = file_get_contents($file_3_img);
                        // here for files
                        $imageType4 = filter_var($file_4_type,FILTER_SANITIZE_STRING);
                        $file_4 = file_get_contents($file_4_img);

                        if($dep == 2 || $dep == 3){
                            $number_taxs = filter_var($_POST['number_taxs'],FILTER_SANITIZE_NUMBER_INT);
                            $file_5_type = $_FILES['file_5']["type"];
                            $file_5_img = $_FILES['file_5']['tmp_name'];
                            // here five files
                            $imageType5 = filter_var($file_5_type,FILTER_SANITIZE_STRING);
                            $file_5 = file_get_contents($file_5_img);
                        }else{
                            $number_taxs = "";
                            $imageType5 = "";
                            $file_5 = "";
                        }

                        @$insert_data = $conn->prepare("INSERT INTO signup_merchant(name_store,type,commercial_register,img_type_commercial,img_file_commercial,date,tax,img_type_tax,img_file_tax,status_merchants,full_name,contact_number,id_user,person_id,img_person_id,file_person_id,img_addr,file_addr,number_taxs,img_taxs,file_taxs,country,city,area,postal_num,international_code) VALUES(:name_store,:type,:commercial_register,:img_type_commercial,:img_file_commercial,:date,:tax,:img_type_tax,:img_file_tax,'في الانتظار',:full_name,:phone_number,:id_user,:person_id,:img_person_id,:file_person_id,:img_addr,:file_addr,:number_taxs,:img_taxs,:file_taxs,:country,:city,:area,:postal_num,:international_code)");
                        @$insert_data->bindParam("name_store",$name_store);
                        @$insert_data->bindParam("type",$type);
                        @$insert_data->bindParam("commercial_register",$commercial);
                        @$insert_data->bindParam("img_type_commercial",$imageType1);
                        @$insert_data->bindParam("img_file_commercial",$file_1);
                        @$insert_data->bindParam("date",$date);
                        @$insert_data->bindParam("tax",$tax);
                        @$insert_data->bindParam("img_type_tax",$imageType2);
                        @$insert_data->bindParam("img_file_tax",$file_2);
                        @$insert_data->bindParam("full_name",$full_name);
                        @$insert_data->bindParam("phone_number",$phone_number);
                        @$insert_data->bindParam("id_user",$_SESSION['id']);
                        @$insert_data->bindParam("person_id",$person_id);
                        @$insert_data->bindParam("img_person_id",$imageType3);
                        @$insert_data->bindParam("file_person_id",$file_3);
                        @$insert_data->bindParam("img_addr",$imageType4);
                        @$insert_data->bindParam("file_addr",$file_4);
                        @$insert_data->bindParam("number_taxs",$number_taxs);
                        @$insert_data->bindParam("img_taxs",$imageType5);
                        @$insert_data->bindParam("file_taxs",$file_5);
                        @$insert_data->bindParam("country",$country);
                        @$insert_data->bindParam("city",$city);
                        @$insert_data->bindParam("area",$area);
                        @$insert_data->bindParam("postal_num",$postal);
                        @$insert_data->bindParam("international_code",$international_code);
                        if($insert_data->execute()):
                            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                        </svg>
                                        <div class="m-auto cairo">
                                            لقد تم استقبال الطلب وسوف يتم الرد بالوافقة أو الرفض
                                        </div>
                                    </div>';
                            sleep(10);
                            echo "<script>document.location = 'signup_merchant.php';</script>";
                        endif;

                    else:

                        echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="m-auto cairo">
                            رجاء ارفع صورة حجمها اقل من 40 ميجا
                        </div>
                    </div>';

                    endif;
                else:
                    echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="m-auto cairo">
                            رجاء املاء بيانات بشكل صحيح
                        </div>
                    </div>';
                endif;

            }else{
                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="m-auto cairo">
                            رجاء اكتب الاسم المتجر غير موجود من قبل
                        </div>
                    </div>';
            }

        endif;
    }catch(PDOException $error_file){
        echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        <div class="m-auto cairo">
                            رجاء ارفع صورة حجمها اقل من 40 ميجا
                        </div>
                    </div>';
    }
}


?>

<section>
    <!-- Start Contact -->
    <div class="container-fluid py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="POST" role="form" enctype="multipart/form-data">
                <div class="row">

                    <div class="mb-3">
                        <label for="inputsubject" class="cairo">اسم المتجر</label>
                        <input type="text" class="form-control mt-1"  name="name_store"
                               placeholder="اكتب اسم متجرك" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">اسم الدولة</label>
                        <input type="text" class="form-control mt-1" id="" name="country" placeholder="اسم دولة التقاط الشحنات" required>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">اسم المدينة</label>
                        <input type="text" class="form-control mt-1" id="text" name="city" placeholder="اسم مدينة التقاط الشحنات" required>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">اسم المنطقة</label>
                        <input type="text" class="form-control mt-1" id="text" name="area" placeholder="اسم المنطقة التقاط الشحنات" required>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">الرقم البريدي</label>
                        <input type="text" class="form-control mt-1" id="text" name="postal" placeholder="الرقم البريدي" required>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">الرمز الدولي</label>
                        <input type="text" class="form-control mt-1" id="text" name="international_code" placeholder="الرمز الدولي" required>
                    </div>
                    <?php if($dep == 1): ?>
                        <div class="form-group col-md-4 mb-3">
                            <label for="inputtext" class="cairo">رمز الوثيقة</label>
                            <input type="text" class="form-control mt-1" id="text" name="commercial" placeholder="رمز الوثيقة" required>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label for="inputsubject" class="cairo">حمل الصورة</label>
                            <input type="file" class="form-control mt-1"  name="file_1" placeholder="حمل الصورة">
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label for="inputtext" class="cairo">تاريخ انتهاء الوثيقة</label>
                            <input type="date" class="form-control mt-1" id="text" name="date" required>
                        </div>
                    <?php elseif($dep == 2 || $dep == 3): ?>

                        <div class="form-group col-md-4 mb-3">
                            <label for="inputtext" class="cairo">رقم السجل التجاري</label>
                            <input type="text" class="form-control mt-1" id="text" name="commercial" placeholder="رقم السجل التجاري" required>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label for="inputsubject" class="cairo">حمل الصورة</label>
                            <input type="file" class="form-control mt-1"  name="file_1" placeholder="حمل الصورة">
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <label for="inputtext" class="cairo">تاريخ انتهاء السجل التجاري</label>
                            <input type="date" class="form-control mt-1" id="text" name="date" required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="inputtext" class="cairo">الرقم الضريبي</label>
                            <input type="text" class="form-control mt-1" id="text" name="number_taxs" placeholder="الرقم الضريبي" required>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <label for="inputsubject" class="cairo">حمل الصورة</label>
                            <input type="file" class="form-control mt-1"  name="file_5" placeholder="حمل الصورة">
                        </div>

                    <?php endif; ?>

                    <div class="form-group col-md-6 mb-3">
                        <label for="inputtext" class="cairo">الاسم الثلاثي للمسؤول</label>
                        <input type="text" class="form-control mt-1" id="text" name="full_name" placeholder="الاسم الثلاثي للمسؤول" required>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="inputtext" class="cairo">رقم تواصل الشخص المسؤول</label>
                        <input type="number" class="form-control mt-1" id="number" name="phone_number" placeholder="+966" required>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">رقم هوية الشخص المسؤول</label>
                        <input type="number" class="form-control mt-1" id="text" name="person_id" placeholder="1234567" required>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="inputsubject" class="cairo">صورة هوية الشخص المسؤول</label>
                        <input type="file" class="form-control mt-1"  name="file_3" placeholder="حمل الصورة">
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="inputtext" class="cairo">العنوان الوطني</label>
                        <input type="file" class="form-control mt-1"  name="file_4" placeholder="حمل الصورة">
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="inputsubject" class="cairo">رقم الايبان البنكي</label>
                        <input type="text" class="form-control mt-1" name="tax" placeholder="ادخل رقم الايبان البنكي بشكل صحيح">
                    </div>


                    <div class="form-group col-md-6 mb-3">
                        <label for="inputsubject" class="cairo">حمل الصورة</label>
                        <input type="file" class="form-control mt-1" name="file_2" placeholder="حمل الصورة">
                    </div>

                </div>




                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-dark px-3 cairo" name="send">ارسال</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <!-- End Contact -->
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