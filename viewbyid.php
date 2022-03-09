<?php
    $title='success-registration';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if (isset($_POST['submit']))
    {
        $id=$_POST['comp_id'];
        $result = $users->getcomprecordsbycompid($id);
       
    }?>


    <?php 
        if($_SESSION['department']==$result['Department']){ ?>

        <table class="table">
            <tbody>
            
                <tr><th scope ="row">
                <h4>User Details:</h4>
                </th>
                
                </tr>
                <tr>
                <th scope="row">User Profile ID :</th>
                <td><?php echo $result['reg_id']?></td>
                </tr>
                <!-- <tr>
                <th scope="row">Profile Name :</th>
                <td> -->
                    <?php 
                    // echo $usersdetails['first_name'].' '. $usersdetails['last_name']
                    ?>
                <!-- </td>
                </tr> -->
                <tr><th scope ="row">
                <h4>Complain Details :</h4>
                </th>
                
                </tr>
                
                <tr>
                <th scope="row">Subject of Complain:</th>
                <td><?php echo $result['comp_sub']?></td>
                </tr>
                <tr>
                <th scope="row">Department :</th>
                <td><?php echo $result['Department']?></td>
                </tr>
                <tr>
                <th scope="row">Summary :</th>
                <td ><?php echo $result['comp_summary']?></td>
                </tr>

                <tr><th scope ="row">
                <h4>Address :</h4>
                </th>
                
                </tr>
                
                <tr>
                <th scope="row">Locality :</th>
                <td><?php echo $result['locality']?></td>
                </tr>
                <tr>
                <th scope="row">Address :</th>
                <td><?php echo $result['address']?></td>
                </tr>
                <tr>
                <th scope="row">District :</th>
                <td><?php echo $result['district']?></td>
                </tr>
                <tr>
                <th scope="row">Sub-Division :</th>
                <td><?php echo $result['sub_div']?></td>
                </tr>
                <tr>
                <th scope="row">Date of Registered :</th>
                <td><?php echo $result['Date']?></td>
                </tr>
                
                <tr><th scope ="row">
                <h4>Progress :</h4>
                </th>
                
                </tr>
                <tr>
                <th scope="row">Status : </th>
                <td><?php echo $result['status']?></td>
                </tr>

                
                <?php if(isset($_SESSION['department'])) {?>
                    <tr>
                        <th scope ="row">
                        <h4>Office Use :</h4>
                        </th>
                
                    </tr>
                    <tr>
                    <th scope="row">Official Status :</th>
                    <td><?php echo $result['official_status']?></td>
                    </tr>
                    <tr>
                    <th scope="row">Completion Report :</th>
                    <td><?php echo $result['solved_report']?></td>
                    </tr>
                    <?php } ?>
                
                <tr>
                    <?php  if( $result['status']=='Rejected'){?>
                        <th scope="row">Reason of rejection : </th>
                        <td class="text-danger"><?php echo $result['rejection_reason']?></td>

                        <?php } elseif($result['status']=='solved'){?>
                        
                        <th scope="row">Solved Report: </th>
                        <td class="text-muted"><?php echo $result['solved_report']?></td></tr>
                        <tr>
                        <th scope="row">Date of Mark as complete :</th>
                        <td><?php echo $result['solved_date']?></td>
                        
                        <?php } ?>
                </tr>
            </tbody>
            </table>


        <?php } else{ ?>
            <div class="alert alert-danger" role="alert">There is an error in processing! The complain Id may be invalid or may be from different department</div>
            <?php } ?>

            

            <div class="alert alert-primary">
        <?php if(isset($_SESSION['adminid'])){?>
            <a class="btn btn-primary" href="admindash.php">Back to DashBoard</a>
          <?php } ?>
          <?php if(isset($_SESSION['officeid'])){?>
            <a class="btn btn-primary" href="dashoffice.php">Back to DashBoard</a>
          <?php } ?>
          <?php if(isset($_SESSION['userid'])){?>
            <a class="btn btn-primary" href="dash.php">Back to DashBoard</a>
          <?php } ?>

</div>
            

<?php
    require_once('includes/footer.php');
    
?>