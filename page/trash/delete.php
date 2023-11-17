<?php

require "../../inc/asset/function.php";

remove('id',$conn->prepare("DELETE FROM cart WHERE iD = :id"),"../cart.php");

?>