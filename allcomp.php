<?php 
    $title='Applied comp details';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $id=$_SESSION['userid'];
    $results= $users->getallcomprecords();
    
?>
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

   
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">

    <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Electricity" href="#"><img src="https://img.icons8.com/external-icongeek26-glyph-icongeek26/64/000000/external-electricity-power-and-energy-icongeek26-glyph-icongeek26.png"/> <br>Electricity</a>
    <a class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="PWD" href="#"><img  src="https://img.icons8.com/ios-glyphs/60/ffffff/road.png"/> <br>
  PWD </a>
    <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Health" href="#"><img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-health-medical-kiranshastry-lineal-kiranshastry.png"/> <br> Health </a>
    <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Health" href="#"><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-education-high-school-flatart-icons-outline-flatarticons.png"/> <br>Education </a>
    <a class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Finance" href="#"><img src="https://img.icons8.com/wired/64/ffffff/card-in-use.png"/><br>Finance</a>
    <a class="btn btn-outline-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Food & Supply" href="#"><img src="https://img.icons8.com/ios/60/000000/wheat.png"/><br>Food & Supply </a>
    <a class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Others" href="#"> <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-random-interface-kiranshastry-lineal-kiranshastry.png"/><br>Others</a>
       
      </div>
    </div>
  </div>
</nav> -->



<section class="">
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
      
    </td>
    <!-- we just create a while loop, where for each time it iterate,we print the value referencing with r, and print the value matching with the coloumns simillar with the database table -->
  </tr>
  <?php } ?> 
   
  </tbody>
</table>
</section>
<?php 
    require_once('includes/footer.php');
?>