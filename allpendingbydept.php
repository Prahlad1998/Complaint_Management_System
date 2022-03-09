<?php 
    $title='Applied comp details';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $department=$_GET['department'];
    $num1=$users->numberofpendingtoforward($department);
    $results= $users->comprecordsbydepartment($department);
    
?>
<?php echo $department;
      echo $num1['num'];
?>



<table class="table">
  <thead>
    <tr>
      <th scope="col">Complain Id</th>
      <th scope="col">Subject of Complain</th>
      <th scope="col">Department</th>
      <th scope="col">Area/locality</th>
      <th scope="col">Date of Register</th>
      <th scope="col">Status</th>
      <!-- <th scope="col">Contact Number</th> -->
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 
  <?php 
  while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>
  <tr>
    <td> <?php echo $r['comp_id'] ?></td>
    <td> <?php echo $r['comp_sub'] ?></td>
    <td> <?php echo $r['Department'] ?></td>
    <td> <?php echo $r['locality'] ?></td> 
    <td> <?php echo $r['Date'] ?></td> 
    <td> <?php echo $r['official_status'] ?></td> 
    <td>
      <a href="vieweachrecord.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-primary">Details</a>
      <?php 
        if ($r['official_status']!='Forwarded'){?>
          <a href="pendingtoforward.php?id=<?php echo $r['comp_id'] ?>" class="btn  btn-success">Forward</a>
          <a href="rejectcomp.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-danger">Reject</a>
      <?php }else{ ?>
          <a href="#" class="btn btn-success">All ready forwarded</a>
        <?php } ?>
     
    
      
    </td>
    <!-- we just create a while loop, where for each time it iterate,we print the value referencing with r, and print the value matching with the coloumns simillar with the database table -->
  </tr>
  <?php } ?> 
   
  </tbody>
</table>

<?php 
    require_once('includes/footer.php');
?>