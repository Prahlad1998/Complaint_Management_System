<?php 
    $title='Applied comp details';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $id=$_SESSION['userid'];
    $results=$users->getcomprecords($id);
    
?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Complain Id</th>
      <th scope="col">Complain Subject</th>
      <th scope="col">Complain Description</th>
      <th scope="col">Area/locality</th>
      <th scope="col">Date of Register</th>
      <th scope="col">Status</th>
      <!-- <th scope="col">Contact Number</th> -->
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <!-- Now lets generate the vale of the table dynamically using php. For this a while loop is used which take parameter as such follows, -->
  <!-- take condition $r(r is a arbirtary values which take the value of the results mentioned above,keyword fetch is used,association...DO THIS OPERATION FOR EACH COLLECTION ,let r embodied the value.   )  -->
  <?php 
  while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>
  <tr>
    <td> <?php echo $r['comp_id'] ?></td>
    <td> <?php echo $r['comp_sub'] ?></td>
    <td> <?php echo $r['comp_summary'] ?></td>
    <td> <?php echo $r['locality'] ?></td> 
    <td> <?php echo $r['Date'] ?></td> 
    <td > <?php if(!$r['status']=='Completed'){?>
        <?php if($r['status']=='Pending...'){?>
            <div class="btn btn-danger"><?php echo $r['status']?></div>

            <?php }else{?>
                <Div class="text-warning"><?php echo $r['status']?></Div>
                <?php } ?>
       

    <?php } else{?>
        <Div class="text-Success"><?php echo $r['status']?></Div>
    <?php }?>  
    <td>
      <a href="vieweachrecord.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-primary">Details</a>
      <br>
     
    </td>
    <!-- we just create a while loop, where for each time it iterate,we print the value referencing with r, and print the value matching with the coloumns simillar with the database table -->
  </tr>
  <?php } ?> 
   
  </tbody>
</table>
<?php 
    require_once('includes/footer.php');
?>