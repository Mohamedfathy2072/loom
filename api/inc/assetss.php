<?php 
    header("Access-Control-Allow-Origin: *");

    header("Content-Type: application/json;charset=UTF-8");

    header("Access-Control-Allow-Methods: GET,POST,PUT");

    header("Access-Control-Max-Age: 3600");

    header("Access-Control-Allow-Headers: *");

    $method = $_SERVER['REQUEST_METHOD'];

    $auth_username = md5("loomshope");

    $auth_password = md5('R3j%$loomshope#RUx!I3!p');
?>