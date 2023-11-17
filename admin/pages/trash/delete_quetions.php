<?php

require "../function.php";
remove('id',$conn->prepare("DELETE FROM contact WHERE id = :id"),"../quetions.php");

?>