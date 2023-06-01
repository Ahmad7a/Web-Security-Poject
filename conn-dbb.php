<?php
$dbHost='localhost';
$dbUser='root';
$dbPass='';
$dbName='gamerstore';
$options = array(
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"
);


try{
    // $conn= new PDO("mysql:host=$dbHost;dbname=$dbName",$dbUser,$dbPass);
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass, $options);

   // echo "success";
}catch(Exception $e){
    echo $e->getMessage();
    exit();
}


