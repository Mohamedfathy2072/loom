<?php

require "../function.php";
remove('id',$conn->prepare("DELETE FROM signup_merchant WHERE id = :id"),"../merchant.php");

?>