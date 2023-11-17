<?php

require "../function.php";
remove('id',$conn->prepare("UPDATE product_merchant SET status_product = 'تم قبول' WHERE ID = :id"),"../request_wit.php");

?>