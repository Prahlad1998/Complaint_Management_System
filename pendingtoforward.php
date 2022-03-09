<?php
     require_once 'db/conn.php';

     if($_GET['id']){
        $id=$_GET['id'];
     
        // calling the crud function
        $result=$users->pendingtoforward($id);
        if ($result){?>
                <script type="text/javascript" > alert("Complain Form having complain id <?php echo $comp_id ?> is successfully forwarded to concern department");
            location="admindash.php";
            </script>';
           
            <?php 
        }else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>