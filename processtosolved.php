<?php
     require_once 'db/conn.php';
    $department=$_SESSION['department'];
     if($_GET['id']){
        $id=$_GET['id'];
     
        // calling the crud function
        $result=$users->processtosolved($id);
        if ($result){?>
                <script type="text/javascript" > alert("Complain has been successfully solved !");
            location="dashoffice.php";
            </script>';
           
            <?php 
        }else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>