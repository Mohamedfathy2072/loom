<?php

    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";

    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){
                        
                        
            if($method == "POST"){


                @$email = filter_var($_POST['email'],FILTER_SANITIZE_STRING);

                if(empty($email) || !isset($email)){
                    print_r(json_encode(['status'=>true,'data'=>'رجاء املاء البريد الكتروني بشكل صحيح']));
                }else{

                    // check email isset or no
                    $checkEmail = $conn->prepare("SELECT * FROM member WHERE email = :email");
                    $checkEmail->bindParam("email",$email);
                    $checkEmail->execute();

                    if($checkEmail->rowCount() == 1){
                        
                        $info_user = $checkEmail->fetch(PDO::FETCH_ASSOC);
                        $code = rand(0,9999999);

                        @$reset_user = $conn->prepare("INSERT INTO forget_passowrd(Email,code,date,status_url,user_id) VALUES(:Email,:code,:date,'false',:user_id)");
                        @$reset_user->bindParam("Email",$info_user['email']);
                        @$reset_user->bindParam("code",$code);
                        @$reset_user->bindParam("date",date("Y-m-d"));
                        @$reset_user->bindParam("user_id",$info_user['id']);
                        @$reset_user->execute();

                        print_r(json_encode(['status'=>true,'data'=>'أرسلنا لك إيميل يحتوي على رابط لإعادة تعيين كلمة السر، برجاء التحقق من إيميلاتك الواردة']));

                            $to = $email;
                            $name = "عزيزي";
                            $link = 'https://'.$_SERVER['HTTP_HOST'].'/login/reset_password.php?code='.$code.'&email='.$email;
                            require_once "../../inc/config/mail_forget.php";

                    }else{
                        
                        header("HTTP/1.1 404 Not Found");
                        print_r(json_encode(['status'=>false,'data'=>'البريد الكتروني خطأ او غير موجود من قبل']));
                    
                    }

                }

            // here server method else
            }else{
                header("HTTP/1.1 404 Not Found");
                print_r(json_encode(['method'=>'Not Found']));
                }


    }
}else{
    header("HTTP/1.1 404 Not Found");
    exit;
}


?>