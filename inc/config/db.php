<?php
require_once __DIR__."/../../vendor/autoload.php";
use Illuminate\Database\Capsule\Manager as Capsule;


try{
    @$user = "root";
    @$pass = "";
    @$host = "localhost";
    @$db_name = "loom";
    @$arabic_option = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8");//For Arabic
    @$conn = new PDO("mysql:host=". $host .";dbname=". $db_name . ";charset=utf8;",$user,$pass,$arabic_option);
    @$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $capsule = new Capsule;

    $capsule->addConnection(    [
        'driver' => 'mysql',
        'host' => $host,
        'database' => $db_name,
        'username' => $user,
        'password' => $pass,

    ]);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();

}catch (PDOException $error) {
echo $error->getMessage();
}

?>