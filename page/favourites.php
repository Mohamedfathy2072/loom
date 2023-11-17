<?php

    if(!isset($_GET['fav']) || empty($_GET['fav'])){
        header("location: ../",true);
        exit;
    }else{
        $id = filter_var($_GET['fav'],FILTER_SANITIZE_NUMBER_INT);
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

        $check_heart = $conn->prepare("SELECT * FROM favourites WHERE product_id_fv = :piv AND member_id = :mi");
        $check_heart->bindParam("piv",$id);
        $check_heart->bindParam("mi",$_SESSION['id']);
        $check_heart->execute();

        if($check_heart->rowCount() >= 1){
            echo "<script>
                        window.history.back();
                </script>";
            exit;
        }else{
            
            $add = $conn->prepare("INSERT INTO favourites(product_id_fv,member_id) VALUES(:id_prouct,:id_member)");
            $add->bindParam("id_prouct",$id);
            $add->bindParam("id_member",$_SESSION['id']);
            if($add->execute()){
                echo "<script>
                        window.history.back();
                </script>";
            }
        
        }

        

    }else{
        header("location: ../",true);
        exit;
    }

?>