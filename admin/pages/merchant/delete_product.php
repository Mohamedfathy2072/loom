<?php

require "../function.php";
remove('id',$conn->prepare("DELETE FROM product_merchant WHERE ID = :id"),"../request_wit.php");

?>