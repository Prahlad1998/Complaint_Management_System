<?php
     require_once 'db/conn.php';

     if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $new_password=$_POST['new_password'];
  
        // calling the crud function
        $result=$users->updatepassword($username,$new_password);
        if ($result){?>
        <script type="text/javascript" > alert("User Profile login password is updated successfully");
            location="login.php";
            </script>';

            

        <?php } else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>