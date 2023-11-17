<?php

    require_once "../inc/assetss.php";
    require_once "../../inc/config/db.php";


if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){
    if($_SERVER['PHP_AUTH_USER'] == $auth_username && $_SERVER['PHP_AUTH_PW'] == $auth_password){


        $data = $conn->query("SELECT * FROM slider ORDER BY id DESC");
    

        foreach($data AS $showData){
            $dataArray['results'][] = [
                'id'=>$showData['id'],
                'url'=>$showData['url'],
                'img_src'=>'https://'.$_SERVER['HTTP_HOST'].'/'.$showData['img_file']
            ];
        }

        print_r(json_encode($dataArray));



    }
}else{
    header("HTTP/1.1 404 Not Found");
    exit;
}
    
?>