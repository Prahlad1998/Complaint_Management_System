<?php 
    $title='Create Complain';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    if(!isset($_GET['id'])){
        echo "<h1 class='text-danger'>Please check the details and connection!</h1>";
       
    }else{
        $id=$_GET['id'];
        $result=$users->singlecomprecords($id);
        $id=$result['reg_id'];
        $users=$users->viewuser($id);

?>
<h2 class="text-center">Report of Complain Registration</h2>

<table class="table">
  <tbody>
    <tr>
      <th scope="row">User Profile ID :</th>
      <td><?php echo $result['reg_id']?></td>
    </tr>
    <tr>
      <th scope="row">Complain ID :</th>
      <td><?php echo $result['comp_id']?></td>
    </tr>

    <tr>
      <th scope="row">Profile Name :</th>
      <td><?php echo $users['first_name'].' '. $users['last_name']?></td>
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
    <tr>
      <th scope="row">Status : </th>
      <td><?php echo $result['status']?></td>
    </tr>
    
      <?php if(isset($_SESSION['department'])) {?>
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
<?php } ?>
<br>
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