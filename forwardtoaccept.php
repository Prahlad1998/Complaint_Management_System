<?php
     require_once 'db/conn.php';

     if($_GET['id']){

        // $id=$_POST['reg_id'];
        // $fname=$_POST['fname'];
        // $lname=$_POST['lname'];
        // $fathername=$_POST['fathername'];
        // $ano=$_POST['ano'];
        // $address=$_POST['address'];
        // $cno=$_POST['cno'];
        // $pin=$_POST['pin'];
        $id=$_GET['id'];
     
        // calling the crud function
        $result=$users->forwardtoaccept($id);
        if ($result){?>
                <script type="text/javascript" > alert("Complain Form having complain id <?php echo $comp_id ?> is accepted successfully");
                <?php if (isset($_SESSION['adminid'])){ ?>
                    location="admindash.php";
                <?php }else{?>
                    location="dashoffice.php";
                <?php } ?>
               
            </script>';
           
            <?php 
        }else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>