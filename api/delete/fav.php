<?php
    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){


            if($method == "POST"):
                
                if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['id_product']) && !empty($_POST['id_product'])){
                
                    $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                    $id_product = filter_var($_POST['id_product'],FILTER_SANITIZE_NUMBER_INT);
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
                        // here transform data with array
                        $data = $login->fetch(PDO::FETCH_ASSOC);

                        // here check fav data with table isset or no
                        $fav_data = $conn->prepare("SELECT * FROM favourites WHERE iD = :id_product AND member_id = :user_id");
                        $fav_data->bindParam("id_product",$id_product);
                        $fav_data->bindParam("user_id",$data['id']);
                        $fav_data->execute();

                        if($fav_data->rowCount() == 1){

                            // here if delete fav with database
                            if($fav_data->execute()){

                            // here delete data with fav table
                            $fav_data = $conn->prepare("DELETE FROM favourites WHERE iD = :id_product AND member_id = :user_id");
                            $fav_data->bindParam("id_product",$id_product);
                            $fav_data->bindParam("user_id",$data['id']);
                            if($fav_data->execute()){
                                
                                $product_info = array(
                                    "login"=>true,
                                    "status"=>true,
                                    "data"=>"تم الحذف من قائمة مفضلة بنجاح"
                                );

                                print_r(json_encode($product_info));
                                
                            }

                            }
                            
                            else{

                                header("HTTP/1.1 404 Not Found");
                                // if not delete with databse
                                $product_info = array(
                                    "login"=>true,
                                    "status"=>false,
                                    "data"=>"لم يتم الحذف"
                                );

                                print_r(json_encode($product_info));
                            }

                        }

                        else{
                            header("HTTP/1.1 404 Not Found");
                            // here if table fav empty
                            $product_info = array(
                                    "login"=>true,
                                    "status"=>false,
                                    "data"=>"غير موجود بيانات بداخل قائمة مفضلة بهذا اي دي معلومات"
                                );

                            print_r(json_encode($product_info));
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
                    print(json_encode(array("status"=>'البريد الكتروني او كلمة السر او اي دي فارغ')));
                
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