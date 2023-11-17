<?php
    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){
    

            @$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

            if($method == "GET" AND isset($id) AND !empty($id)){
        
                $data = $conn->prepare("SELECT * FROM product WHERE category = :id ORDER BY iD DESC");
                $data->bindParam("id",$id);
                $data->execute();
        
                if($data->rowCount() != 0){
                    
                    $data = $data->fetchAll(PDO::FETCH_ASSOC);
                    foreach($data AS $show => $key){
                        
                        $data_api['results'][] = [
                            'id'=>$data[$show]['ID'],
                            'title'=>$data[$show]['title'],
                            'description'=>$data[$show]['description_api'],
                            'price'=>$data[$show]['price'],
                            'price_coupon'=>$data[$show]['price_coupon'],
                            'size_title'=>$data[$show]['size_title'],
                            'size'=>$data[$show]['size'],
                            'quantity'=>$data[$show]['quantity'],
                            'return_product'=>$data[$show]['rt_product'],
                            'guarantee'=>$data[$show]['grenti'],
                            'model'=>$data[$show]['generate_code'],
                            "img"=>'https://'.$_SERVER['HTTP_HOST'].'/'.$data[$show]['img_file']
                        ];
                        
                    }
                    
                     print_r(json_encode($data_api));
        
        
                }else{
                    
                    header("HTTP/1.1 404 Not Found");
                    $data = ["results"=>["data"=>"لا يوجد بيانات"]];
                    print_r(json_encode($data));
        
                }
            }else{
                   
                $data = $conn->query("SELECT * FROM product ORDER BY iD DESC");

                $data = $data->fetchAll(PDO::FETCH_ASSOC);
                foreach($data AS $show => $key){
                    
                    $data_api['results'][] = [
                        'id'=>$data[$show]['ID'],
                        'title'=>$data[$show]['title'],
                        'description'=>$data[$show]['description_api'],
                        'price'=>$data[$show]['price'],
                        'price_coupon'=>$data[$show]['price_coupon'],
                        'size_title'=>$data[$show]['size_title'],
                        'size'=>$data[$show]['size'],
                        'quantity'=>$data[$show]['quantity'],
                        'return_product'=>$data[$show]['rt_product'],
                        'guarantee'=>$data[$show]['grenti'],
                        'model'=>$data[$show]['generate_code'],
                        "img"=>'https://'.$_SERVER['HTTP_HOST'].'/'.$data[$show]['img_file']
                    ];
                    
                }
                
                 print_r(json_encode($data_api));
            }


        }
    }else{
        header("HTTP/1.1 404 Not Found");
        exit;
    }

   
?>