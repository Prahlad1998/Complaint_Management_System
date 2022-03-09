<?php
     require_once 'db/conn.php';

     if(isset($_POST['submit'])){
         
        $id=$_POST['comp_id'];
        $comp_id=$_POST['comp_id'];
        $status=$_POST['status'];
        $official_status=$_POST['official_status'];
        $rejection_reason=$_POST['rejection_reason'];
       

     
        // calling the crud function
        $result=$users->reject($id,$comp_id,$status,$official_status,$rejection_reason);
        if ($result){?>
             <script type="text/javascript" > alert("Complain Form having complain-id <?php echo $comp_id ?> is rejected successfully");
             
            location="admindash.php";
            </script>';
          
       <?php }else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>