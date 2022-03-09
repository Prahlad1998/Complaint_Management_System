<?php 
   $host ='localhost';
   $db ='Complain';
   $user ='root';
   $pass ='';
   $charset ='utf8mb4';

   $dsn="mysql:host=$host;dbname=$db;charset=$charset";

   try{
            $pdo = new PDO($dsn,$user,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch(PDOexception $e){
             echo $e->getmessage();
             throw new PDOException($e -> getMessage());
             return false;
   }
   require_once 'crud.php';
   $crud = new crud($pdo);
   require_once 'user.php';
   $users = new users($pdo);
?>