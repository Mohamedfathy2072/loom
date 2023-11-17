<?php
    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
        if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){

                    
        if(isset($_GET['id']) && !empty($_GET['id'])){

            $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

            $data = $conn->prepare("SELECT * FROM category WHERE id = :id");
            $data->bindParam('id',$id);
            $data->execute();

            // if isset categorys with database
            if($data->rowCount() == 1){
                $show_data = $data->fetch(PDO::FETCH_ASSOC);

                $categorys["results"] = [
                    "id"=>$show_data['id'],
                    "title"=>$show_data['Title'],
                    "img"=>'https://'.$_SERVER['HTTP_HOST'].'/'.$show_data['image_file']
                ];
            
                print_r(json_encode($categorys));

            }else{

                header("HTTP/1.1 404 Not Found");
                print_r(json_encode(['results'=>['status'=>false,'data'=>'القسم غير موجود']]));
                
            }

        }else{

            $data = $conn->query("SELECT * FROM category");

            foreach($data AS $show){
                $categorys["results"][] = [
                    "id"=>$show['id'],
                    "title"=>$show['Title'],
                    "img"=>'https://'.$_SERVER['HTTP_HOST'].'/'.$show['image_file']
                ];
            }

            print_r(json_encode($categorys));

        }




        }
    }else{
        header("HTTP/1.1 404 Not Found");
        exit;
    }

?>