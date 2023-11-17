<?php

require "../../inc/asset/function.php";

remove('id',$conn->prepare("DELETE FROM favourites WHERE iD = :id"),"../myheart.php");

?>