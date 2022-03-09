
<?php
    $title= 'profile';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    // if(!isset($_SESSION['userid'])){
    //     echo "<h1 class='text-danger'>Please check the details and connection!</h1>";
       
    // }else{
        $id=$_GET['id'];
        $result = $users->viewuser($id); //here id is coming fro the value passed in the a link from the viewrecords table
?>

<div class="card text-dark bg-light mb-3"  style=" max-width: 30rem;">
  <div class="card-header"><h5><?php echo $result['username'] ?></h5>
  <h6 class="card-title text-muted"><?php echo $result['email']?></h6>
</div>
  <div class="card-body">
    <h4 class="card-title">Name : <?php echo $result['first_name'].' '. $result['last_name']?></h4>
    <h5 class="card-text">Aadhar No : <?php echo $result['aadhar_no']?></h5>

    <h6 class="card-title text-muted">Father Name : <?php echo $result['father_name']?></h6>
    <h6 class="card-title text-muted">Contact No : <?php echo $result['cno']?></h6>
    <!-- <h5 class="card-text">Date of Birth : <?php echo $result['dob']?></h5> -->

    <p class="card-text"> Address : <?php echo $result['address']?></p>
    <p class="card-text"> Pin No : <?php echo $result['pin']?></p>
  </div>
</div>
<br/>
      <a href="admindash.php" class="btn btn-info">DashBoard</a>
      <a href="allusers.php" class="btn btn-warning">Back to List</a>
      <!-- <a href="delete.php?id=<?php //echo $result['can_id'] ?>" class="btn btn-danger">Delete</a> -->



<?php 
require_once('includes/footer.php');
?>