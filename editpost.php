<?php
     require_once 'db/conn.php';

     if(isset($_POST['submit'])){

        $id=$_POST['reg_id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $fathername=$_POST['fathername'];
        $ano=$_POST['ano'];
        $address=$_POST['address'];
        $cno=$_POST['cno'];
        $pin=$_POST['pin'];

     
        // calling the crud function
        $result=$users->edituser($id,$fname,$lname,$fathername,$ano,$address,$cno,$pin);
        if ($result){?>
        <script type="text/javascript" > alert("User Profile is updated successfully");
            location="dash.php";
            </script>';

            

        <?php } else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>