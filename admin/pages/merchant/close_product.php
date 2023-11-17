<?php

require "../function.php";
remove('id',$conn->prepare("UPDATE product_merchant SET status_product = 'مرفوض' WHERE ID = :id"),"../request_wit.php");

?>