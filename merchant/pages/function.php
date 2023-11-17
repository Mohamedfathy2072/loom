<?php

session_start();
session_regenerate_id();
if(!isset($_SESSION['username_admins']) || !isset($_SESSION['email_admins']) || !isset($_SESSION['password_admins'])) {
    header("location: ../login3.php", true);
    exit();
}

require "../../../inc/config/db.php";
// require check member is merchant or no
require "inc/check_member.php";

function remove($page,$commands,$localtion){
$delete = filter_var($_GET[$page],FILTER_SANITIZE_STRING);
if(isset($delete)):
$sql = $commands;
$sql->bindParam("id",$delete);
$sql->bindParam("id_user",$_SESSION['id']);
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