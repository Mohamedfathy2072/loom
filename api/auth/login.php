<?php

    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){


            

if($method == "POST"):
    
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
    
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password = md5($_POST['password']);
    
        // here create system login if status not avalible
        $login_status_no = $conn->prepare("SELECT * FROM member WHERE email = :email AND password = :password AND status = 'no'");
        $login_status_no->bindParam("email",$email);
        $login_status_no->bindParam("password",$password);
        $login_status_no->execute();
    
        
        // here create system login if status avalible
        $login = $conn->prepare("SELECT * FROM member WHERE email = :email AND password = :password AND status = 'yes'");
        $login->bindParam("email",$email);
        $login->bindParam("password",$password);
        $login->execute();
    
        // if login sucssfully
        if($login->rowCount() == 1){
    
            $data = $login->fetch(PDO::FETCH_ASSOC);
    
            $data = array(
                "status"=>"تم تسجيل الدخول بنجاح",
                "login"=>true,
                "id"=>$data['id'],
                "firstName"=>$data['first_name'],
                "lastName"=>$data['last_name'],
                "email"=>$data['email'],
                "phone_number"=>$data['phone_number'],
                "gender"=>$data['gender'],
                "communication_lang"=>$data['lang']
            );
    
            print_r(json_encode($data));
            
        }else if($login_status_no->rowCount() == 1){
            
            header("HTTP/1.1 404 Not Found");
            print_r(json_encode(['status'=>'الحساب غير مفعل رجاء تحقق من البريدك الكروني لتفعيل حسابك','login'=>false]));
        
        }else{
    
            header("HTTP/1.1 404 Not Found");
            print_r(json_encode(array("status"=>'البريد الكتروني او كلمة السر خطأ',"login"=>false)));
        
        }
    
    
    }else{
        header("HTTP/1.1 404 Not Found");
        print(json_encode(array("status"=>'البريد الكتروني او كلمة السر فارغ')));
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