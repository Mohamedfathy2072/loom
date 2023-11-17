<?php

session_start();
session_regenerate_id();
if(!isset($_SESSION['username_admins']) || !isset($_SESSION['email_admins']) || !isset($_SESSION['password_admins']) || !isset($_SESSION['role_delete']) || $_SESSION['role_delete'] != "الحذف") {
    header("location: ../", true);
    exit();
}

require "../../../inc/config/db.php";

function remove($page,$commands,$localtion){
$delete = filter_var($_GET[$page],FILTER_SANITIZE_STRING);
if(isset($delete)):
$sql = $commands;
$sql->bindParam("id",$delete);
if($sql->execute()){
header("location: ".$localtion,true);
}else{
echo "<script>
    alert('لا يمكنك حذفها');
</script>";
}
endif;
}


?>