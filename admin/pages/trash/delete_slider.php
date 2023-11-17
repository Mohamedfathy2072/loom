<?php

require "../function.php";
remove('id',$conn->prepare("DELETE FROM slider WHERE id = :id"),"../pages.php");

?>