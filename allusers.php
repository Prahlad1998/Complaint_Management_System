<?php 
    $title='All Users Details';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $alluser = $users->getallusers();
    // $id=$allusers['reg_id'];
    // $complain=$users-> numberofcomplainbyuser($id);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">User Id</th>
      <th scope="col">Name</th>
     
      <!-- <th scope="col">Address</th> -->
      <th scope="col">Contact Number</th>
      <!-- <th scope="col">Complain Raised</th> -->


      <!-- <th scope="col">Contact Number</th> -->
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <!-- Now lets generate the vale of the table dynamically using php. For this a while loop is used which take parameter as such follows, -->
  <!-- take condition $r(r is a arbirtary values which take the value of the results mentioned above,keyword fetch is used,association...DO THIS OPERATION FOR EACH COLLECTION ,let r embodied the value.   )  -->
  <?php 
  while ($r=$alluser->fetch(PDO::FETCH_ASSOC)){?>
  <tr>
    <td> <?php echo $r['reg_id'] ?></td>
    <td> <?php echo $r['first_name'].' '. $r['last_name'] ?></td>
    
    <td> <?php echo $r['cno'] ?></td> 
    <!-- <td> <?php //echo $s['num'] ?></td>  -->
    <!-- here 'name' is from specialities table -->    
    <td>
      <a href="viewuserdetails.php?id=<?php echo $r['reg_id'] ?>" class="btn btn-primary">View User Details</a> 
      <a href="applycompadmin.php?id=<?php echo $r['reg_id'] ?>" class="btn btn-success">View Complains</a>
    </td>
    <!-- we just create a while loop, where for each time it iterate,we print the value referencing with r, and print the value matching with the coloumns simillar with the database table -->
  </tr>
  <?php } ?> 
   
  </tbody>
</table>


<?php
    require_once('includes/footer.php');

?>