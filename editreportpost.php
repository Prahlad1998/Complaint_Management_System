<?php
     require_once 'db/conn.php';

     if(isset($_POST['submit'])){

        $id=$_POST['comp_id'];
        $comp_id=$_POST['comp_id'];
        $official_status=$_POST['official_status'];
        $solved_report=$_POST['solved_report'];
        $solved_date=$_POST['solved_date'];
        // calling the crud function
        $result=$users->editcompreport($id,$comp_id,$official_status,$solved_report,$solved_date);
        if ($result){?>
        <script type="text/javascript" > alert("Updated Successfully !");
            location="officeforwarded.php?status=report_submitted";
            </script>';

            

        <?php } else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>