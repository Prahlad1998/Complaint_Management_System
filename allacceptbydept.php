<?php 
    $title='Applied comp details';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $department=$_GET['department'];
    $status='processing';
    $status1='report_submitted';
    if (!isset($_GET['department'])){
        $results=$users->getcomprecordsbystatus($status);
    }else{
        $results= $users->getforwardedcomprecordsbyadmin($department,$status);
    }
    $num1=$users->numberofpendingtoforward($department);
    // $results= $users->comprecordsbydepartment($department);
   
    $number=$users->numberofcompsbystatusbyadmin($status,$department);
    
?>
<?php 
    if($number['num']==0 and isset($_GET['department'])){?>
        <div class="alert alert-danger" role="alert">
           No Data, The list is Empty !
        </div>
        <div style="
            display:flex; justify-content:center ; align-items:center;
            height:auto;
           
        " >
            <img src="https://img.icons8.com/windows/100/000000/no-data-availible.png"/>

        </div> 

<?php } else{ ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Complain Id</th>
      <th scope="col">Subject of Complain</th>
      <th scope="col">Department</th>
      <th scope="col">Area/locality</th>
      <th scope="col">Date of Register</th>
      <th scope="col">Official Status</th>
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
    <?php if ($r['official_status']=='report_submitted'){?>
        <a href="#" class="btn btn-warning">report submitted</a>
        <?php }else{ ?>
            <a href="solved.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-success">Make Completion Report</a>
        <?php } ?>    
    
    </td>
    <!-- we just create a while loop, where for each time it iterate,we print the value referencing with r, and print the value matching with the coloumns simillar with the database table -->
  </tr>
  <?php } ?> 
   
  </tbody>
</table>
    
<?php } ?>



<?php 
    require_once('includes/footer.php');
?>