<?php 
    $title='Solved complain details';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $id=$_SESSION['userid'];
    $results= $users->getsolvedcomprecords();
    
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Complain Id</th>
      <th scope="col">Complain Subject</th>
      <th scope="col">Area/locality</th>
      <th scope="col">Date of Register</th>
      <th scope="col">Date of Mark as Complete</th>
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
    <td> <?php echo $r['locality'] ?></td> 
    <td> <?php echo $r['Date'] ?></td> 
    <td> <?php echo $r['solved_date'] ?></td> 
    <td > <?php echo $r['status']?></td>
    <td>
      
      <a href="vieweachrecord.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-info">Details</a>
    </td>
  
  </tr>
  <?php } ?> 
   
  </tbody>
</table>
<?php 
    require_once('includes/footer.php');
?>