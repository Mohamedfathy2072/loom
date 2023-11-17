<?php 
    session_start();
    session_unset();
    session_destroy();
    header("location: ../login3.php",true);
    exit;
?>