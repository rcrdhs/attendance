<?php
    $host = 'localhost';
    $db ='attendance';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Hello Master";
    } catch(PDOException $e){
      // throw new PDOException($e->getMessage());
       // echo "<h1 class='text-danger'> Database Connection failed</>";
        
    }

    require_once 'crud.php';
    $crud = new crud($pdo);
?>