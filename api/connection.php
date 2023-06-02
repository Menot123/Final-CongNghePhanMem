<?php
    error_reporting(0);
    header('Access-Control-Allow-Origin: *');
    $host = 'localhost';
    $dbName = 'webnongsan';
    $username = 'root';
    $password = '';

    try{
        $dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(PDOException $ex){
        die(json_encode(array('status' => false, 'data' => 'Unable to connect: ' . $ex->getMessage())));
    }
?>