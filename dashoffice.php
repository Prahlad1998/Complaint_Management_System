<?php
    require_once 'includes/session.php';
    $title='Officer-dashboard';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $id=$_SESSION['userid'];
    $department=$_SESSION['department'];
    $results=$users->getcomprecordsbydept($department); 
    $statusforwarded='Forwarded';
    $statusreject='Rejected';
    $statusprocessing='processing';
    $statusreport='report_submitted';
    $statussolved='solved';
    $numforwarded=$users->numberofcompsbystatus($statusforwarded,$department);
    $numrejected=$users->numberofcompsbystatus($statusreject,$department);
    $numprocessing=$users->numberofcompsbystatus($statusprocessing,$department);
    $numreport=$users->numberofcompsbystatus($statusreport,$department);
    $numsolved=$users->numberofcompsbystatus($statussolved,$department);
    $numforwarded=$users->numberofcompsbystatus($statusforwarded,$department);
    $totalnumber=$numforwarded['num']+$numprocessing['num']+$numreport['num'];
    

    // $results=$users->getcomprecords($id);


?> 
<div style="
            display:flex; justify-content:space-evenly ; align-items:center;
           
">
<div>
  <h5 class="shadow p-3 mb-5 bg-white rounded text-dark">Department : <?php echo $department; ?></h5>
</div>
<form class="d-flex shadow p-3 mb-5 bg-white rounded" action="viewbyid.php" method="post">
        
        <input class="form-control" type="search" placeholder="Type the complaint Id :" aria-label="Search" name="comp_id">

        <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
</form>
      <div>
  <h5 class="shadow p-3 mb-5 bg-white rounded text-dark">Remaining to solve : <?php echo $totalnumber; ?></h5>
</div>
</div>
<br>
<br>
<div class="row">
  <div class="col-sm-4">
  <div class="card text-white bg-secondary mb-3" style="max-width: 21.5rem;">
  
  <div class="card-body">
    <h5 class="btn btn-outline-light">FORWARDED COMPLAINTS</h5>
    <p class="card-text">These complaints are forwarded from Admin.</p>
    <a href="officeforwarded.php?status=Forwarded" class="btn btn-dark">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $numforwarded['num'] ?></a>
  </div>
</div>
  </div>
  <div class="col-sm-4">
  <div class="card text-white bg-dark mb-3" style="max-width: 23rem;">
  <div class="card-body">
    <h5 class="btn btn-outline-light">PROCESSING COMPLAINTS</h5>
    <p class="card-text">These complaints are in progress and yet to be completed.</p>
    <a href="officeforwarded.php?status=processing" class="btn btn-outline-light">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $numprocessing['num'] ?></a>

  </div>
</div>
  </div>
  <div class="col-sm-4 ">
  <div class="card text-white bg-success mb-3" style="max-width: 23rem;">
  <div class="card-body">
    <h5 class="btn btn-outline-light">READY FOR COMPLETE</h5>
    <p class="card-text">Check the completion report and mark as complete if the report is correct.</p>
    <a href="officeforwarded.php?status=report_submitted" class="btn btn-dark">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $numreport['num'] ?></a>
  </div>
</div>
  </div>
</div>
<br>
<div class="row ">
  <div class="col-sm-6 shadow-sm p-3 mb-5 bg-white rounded">
    <div class="card bg-success text-light">
      <div class="card-body">
        <h5 class="btn btn-outline-light">SOLVED COMPLAINTS</h5>
        <p class="card-text">Details of all solved Complaints. </p>
        <a href="officeforwarded.php?status=solved" class="btn btn-dark">Get the list</a>
        <a href="#" class="btn btn-outline-light">Total : <?php echo $numsolved['num'] ?></a>

      </div>
    </div>
  </div>
  <div class="col-sm-6 shadow-sm p-3 mb-5 bg-white rounded">
    <div class="card bg-secondary text-light">
      <div class="card-body">
        <h5 class="btn btn-outline-light">REJECTED COMPLAINTS</h5>
        <p class="card-text">Details of all rejected Complaints.</p>
        <a href="officeforwarded.php?status=Rejected" class="btn btn-dark">Get the list</a>
        <a href="#" class="btn btn-outline-light">Total : <?php echo $numrejected['num'] ?></a>

      </div>
    </div>
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Complain Id</th>
      <th scope="col">Subject of Complain</th>
      <th scope="col">Department</th>
      <th scope="col">Date of Register</th>
      <th scope="col">official Status</th>
      <th scope="col">Status</th>
      <!-- <th scope="col">Contact Number</th> -->
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 
  <?php 
  while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>
  <?php  if ($r['official_status']!='Pending...' and $r['official_status']!='Rejected' and $r['official_status']!='solved'){ ?>
    <tr>
    <td> <?php echo $r['comp_id'] ?></td>
    <td> <?php echo $r['comp_sub'] ?></td>
    <td> <?php echo $r['Department'] ?></td>
    <td> <?php echo $r['Date'] ?></td> 
    <td> <?php echo $r['official_status'] ?></td> 
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
      
          
        <?php } ?>
    </td>
    <!-- we just create a while loop, where for each time it iterate,we print the value referencing with r, and print the value matching with the coloumns simillar with the database table -->
  </tr>

  <?php } ?>


   
  </tbody>
</table>


<br>

    
<?php
    require_once 'includes/footer.php';
?>