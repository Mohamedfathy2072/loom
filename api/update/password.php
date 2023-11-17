<?php
    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){

                        
            if($method == "POST"):
                
                if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['new_pass']) && !empty($_POST['new_pass'])){
                
                    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                    $password = md5($_POST['password']);

                    // filter data
                    $new_pass = md5($_POST['new_pass']);

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
                        // update data
                        $update_data = $conn->prepare("UPDATE member SET password = :new_pass WHERE id = :id");
                        $update_data->bindParam("new_pass",$new_pass);
                        $update_data->bindParam("id",$data['id']);

                        if($update_data->execute()){
                            // if sucssfuly update data
                            $arraydata = [
                                'login'=>true,
                                'status'=>true,
                                'update'=>true,
                                'data'=>'تم تحديث كلمة السر بنجاح'
                            ];

                            print_r(json_encode($arraydata));
                        }

                        // if not update data
                        else{
                            $arraydata = [
                                'login'=>true,
                                'status'=>false,
                                'update'=>false,
                                'data'=>'يوجد خطأ لم يتم تحديث كلمة السر'
                            ];

                            print_r(json_encode($arraydata));
                        }

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