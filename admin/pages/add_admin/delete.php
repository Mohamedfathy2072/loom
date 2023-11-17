<?php

require "function.php";
remove('id',$conn->prepare("DELETE FROM member_admin WHERE id = :id"),"admins.php");

?>