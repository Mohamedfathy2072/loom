<?php

// generate user token from IP and user agent
function getUserPCInfo(){
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $ip = null;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return  $ip . ":" .$user_agent ;
}
// first time login generate token
if(empty($_SESSION['tokenH'])){
    $_SESSION['tokenH'] = password_hash(getUserPCInfo(), PASSWORD_DEFAULT);
}else {
    // if attack happen, or user IP changed(switch to other router), ask user to re-open the browser
    if(!password_verify(  getUserPCInfo(),$_SESSION['tokenH'] ) ) {
        die("أنت لا تستخدم كلمة السر صالحًا ، أغلق المتصفح وافتحه مرة أخرى");
        session_unset();
        session_destroy();
        exit;
    }
}