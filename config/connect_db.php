<?php
    session_start();
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'web_drink');
    define('BASE_URL_PATH', '/');
    define('BASE_URL_LOGIN', 'http://localhost/tech_web/login.php');
    function getDB(){
        $dbhost = DB_SERVER;
        $dbuser = DB_USERNAME;
        $dbpass = DB_PASSWORD;
        $dbname = DB_DATABASE;
        try{
            $dbConnect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            $dbConnect->exec("set names utf8");
            $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnect;

        } catch(PDOException $e){
            echo 'Connection failed' . $e->getMessage();
        }
    }
    function redirect($location)
    {
        header('Location: ' . $location);
        exit();
    }
?>