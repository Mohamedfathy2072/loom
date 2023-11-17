<?php
    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){


        @$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

        if($method == "GET" AND isset($id) AND !empty($id)){

            $data = $conn->prepare("SELECT * FROM product WHERE ID = :id");
            $data->bindParam("id",$id);
            $data->execute();

            if($data->rowCount() == 1){
                
                $data = $data->fetch(PDO::FETCH_ASSOC);
                
                // here show multiplae image
                $img = $conn->prepare("SELECT * FROM img_product WHERE product_id = :id");
                $img->bindParam("id",$id);
                $img->execute();

                if($img->rowCount() > 0){

                    $img = $img->fetchAll(PDO::FETCH_ASSOC);

                    $product_info['results'] = [
                        'id'=>$data['ID'],
                        'title'=>$data['title'],
                        'description'=>$data['description_api'],
                        'price'=>$data['price'],
                        'price_coupon'=>$data['price_coupon'],
                        'size_title'=>$data['size_title'],
                        'size'=>$data['size'],
                        'quantity'=>$data['quantity'],
                        'return_product'=>$data['rt_product'],
                        'guarantee'=>$data['grenti'],
                        'model'=>$data['generate_code'],
                        "img"=>'https://'.$_SERVER['HTTP_HOST'].'/'.$data['img_file'],
                        'img_src'=>$img
                    ];

                    print_r(json_encode($product_info));
                    
                }else{

                    $product_info['results'] = [
                        'id'=>$data['ID'],
                        'title'=>$data['title'],
                        'description'=>$data['description_api'],
                        'price'=>$data['price'],
                        'price_coupon'=>$data['price_coupon'],
                        'size_title'=>$data['size_title'],
                        'size'=>$data['size'],
                        'quantity'=>$data['quantity'],
                        'return_product'=>$data['rt_product'],
                        'guarantee'=>$data['grenti'],
                        'model'=>$data['generate_code'],
                        "img"=>'https://'.$_SERVER['HTTP_HOST'].'/'.$data['img_file'],
                    ];

                    print_r(json_encode($product_info));
                }


            }else{
                header("HTTP/1.1 404 Not Found");
                $data = ['results'=>["data"=>"لا يوجد بيانات"]];
                print_r(json_encode($data));
                exit;

            }
        }else{
                header("HTTP/1.1 404 Not Found");
                $data = ['results'=>["data"=>"اي دي غير موجود"]];
                print_r(json_encode($data));
                exit;
        }

    }
}else{
    header("HTTP/1.1 404 Not Found");
    exit;
}

?>