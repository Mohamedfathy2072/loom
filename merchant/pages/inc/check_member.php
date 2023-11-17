<?php 
    $check_member = $conn->prepare("SELECT * FROM signup_merchant WHERE id_user = :id AND status_merchants = 'مفعل'");
    $check_member->bindParam("id",$_SESSION['id']);
    $check_member->execute();

    if($check_member->rowCount() != 1){
      echo "<script>document.location = '../../';</script>";
      exit;
    }
?>