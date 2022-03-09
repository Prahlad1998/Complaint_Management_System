<?php
     require_once 'db/conn.php';

     if(isset($_POST['submit'])){

        $id=$_POST['comp_id'];
        $comp_id=$_POST['comp_id'];
        $status=$_POST['status'];
        $solved_report=$_POST['solved_report'];
        $solved_date=$_POST['solved_date'];
        $results=$users->getcomprecordsbycompid($id);
        $department=$results['Department'];
       

     
        // calling the crud function
        $result=$users->solved($id,$comp_id,$status,$solved_report,$solved_date);
        if ($result){?>
            <script type="text/javascript" > alert("The completion report has been submitted successfylly !");
            location="allacceptbydept.php?department=<?php echo $department ?>";
            </script>';

            <!-- header( "location:allsolved.php"); -->
        <?php }else{
            echo 'error';
        }

     }else{
         echo 'error again';
     }

?>