<?php
 $dsn="mysql:host=localhost;dbname=JUCARRIA;charset=utf8mb4";
 $options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
 $username="root";
 $pass="";
 try{
 $pdo = new PDO($dsn,$username,$pass,$options);
 }
 catch(PDOException $e){
     throw new PDOException($e->getMessage(), $e->getCode());
 }