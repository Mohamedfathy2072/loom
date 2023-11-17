<?php

require "function.php";
remove('id',$conn->prepare("DELETE FROM category WHERE id = :id"),"categorys.php");

?>