<?php

require "../function.php";
remove('id',$conn->prepare("UPDATE signup_merchant SET status_merchants = 'مفعل' WHERE ID = :id"),"../merchant.php");

?>