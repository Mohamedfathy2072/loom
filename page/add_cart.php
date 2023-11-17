<?php

    if(!isset($_GET['cart']) || empty($_GET['cart'])){
        header("location: ../",true);
        exit;
    }else{
        $id = filter_var($_GET['cart'],FILTER_SANITIZE_NUMBER_INT);
    }

    session_start();
    session_regenerate_id();

    if(empty($_SESSION['id']) || !isset($_SESSION['id'])){
        echo "<script>document.location = '../login/login3.php';</script>";
        exit;
    }

    require "../inc/config/db.php";


    $check_id = $conn->prepare("SELECT * FROM product WHERE ID = :id");
    $check_id->bindParam("id",$id);
    $check_id->execute();

    if($check_id->rowCount() == 1){
            
        $add = $conn->prepare("INSERT INTO cart(id_product_card,member_id) VALUES(:id_prouct,:id_member)");
        $add->bindParam("id_prouct",$id);
        $add->bindParam("id_member",$_SESSION['id']);
        if($add->execute()){
            header("location: cart.php",true);
        }
        
    }else{
        header("location: ../",true);
        exit;
    }

?>