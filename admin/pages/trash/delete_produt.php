<?php 

    require "../function.php";

    $id_page = filter_var($_GET["id"],FILTER_SANITIZE_STRING);
    $data = $conn->prepare("SELECT * FROM img_product WHERE product_id = :idpage");
    $data->bindParam("idpage",$id_page);
    $data->execute();

    foreach($data AS $name_img){
        $path = "../../../" . $name_img['file_src'];
        @unlink($path);
    }

    remove('id',$conn->prepare("DELETE FROM product WHERE ID = :id"),"../product.php");
    
?>