<?php

session_start();
session_regenerate_id();
if(!isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header("location: ../../login3.php", true);
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