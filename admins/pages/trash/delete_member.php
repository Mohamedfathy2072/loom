<?php

require "../function.php";
remove('id',$conn->prepare("DELETE FROM member WHERE id = :id"),"../member.php");

?>