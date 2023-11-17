<?php

    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";

    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){

                            
            if($method == "POST"):
                // here filter data
                @$firstName = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
                @$lastName = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
                @$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                @$phone = filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRIPPED);
                @$password = $_POST['password'];
                @$random = rand(0,9999999);

                // here filter data with input radio
                if(@$_POST['gender'] == 1){
                    $gender = "ذكر";
                }
                elseif(@$_POST['gender'] == 2){
                    $gender = "أنثى";
                }else{
                    $gender = null;
                }
                
                // here filter lang
                if(@$_POST['lang'] == 2){
                    $lang = "الإنجليزية";
                }else{
                    $lang = "العربية";
                }

                // here check data
                if(empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password) || empty($gender)){
                    print_r(json_encode(['status'=>false,'data'=>'رجاء لا ترسل بيانات فارغة']));
                }else{
                    // transform password with encripyt md5
                    $password = md5($password);

                    $check_email = $conn->prepare("SELECT * FROM member WHERE email = :email");
                    $check_email->bindParam("email",$email);
                    $check_email->execute();

                    // if email not isset
                    if($check_email->rowCount() == 0){

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
                                // send massgess confirm with email
                                $to = $email;
                                $name = $firstName;
                                $link = 'https://'.$_SERVER['HTTP_HOST'].'/login/verifyAccount.php?code='.$random;
                                require_once "../../inc/config/mail.php";

                                print_r(json_encode(['status'=>true,'data'=>'تم انشاء الحساب بنجاح']));
                        }

                    }else{
                        header("HTTP/1.1 404 Not Found");
                        print_r(json_encode(['status'=>false,'data'=>'البريد الكتروني موجود من قبل']));
                    }

                }

                else:
                    header("HTTP/1.1 404 Not Found");
                    print_r(json_encode(['method'=>'Not Found']));
            endif;

    }
}else{
    header("HTTP/1.1 404 Not Found");
    exit;
}


?>