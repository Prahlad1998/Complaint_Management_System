<?php 
    $title='Pending requests by department';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $id=$_SESSION['userid'];
    $status='pending...';
    $results= $users->getpendingcomprecords();
    $nopendingElectricity = $users-> numberofpendingbyElectricity();
    $nopendingPWD = $users-> numberofpendingbyPWD();
    $nopendingHealth = $users-> numberofpendingbyHealth();
    $nopendingEducation = $users-> numberofpendingbyEducation();
    $nopendingFinance = $users-> numberofpendingbyFinance();
    $nopendingFood_supply = $users-> numberofpendingbyFood_supply();
    $nopendingOthers = $users-> numberofpendingbyOthers();
    $allpending =  $users-> numberofallpending(); 
    $numprocessall=$users->numberofallcompsbystatusbyadmin($status);
?>
  <div style="
            display:flex; justify-content:space-evenly ; align-items:center;
           
">       
        <h4 class="shadow p-3 mb-5 bg-white rounded"><?php echo $title ?></h4>
        <div>
          <h4 class="btn btn-light shadow p-3 mb-5 bg-white rounded">
            Total processing complaints of all department :
            <span style=
            " font-size:2.2rem">
            <?php echo $numprocessall['num']; ?>
            </span>
          </h4>
        </div>
      
</div>
 <!-- Categorised by department -->
 <div class="row">
  <div class="col-sm-4">
  <div class="card text-white bg-secondary mb-3" style="max-width: 21.5rem;">
  
  <div class="card-body">
    <h5 class="btn btn-outline-light">ELECTRICITY</h5>
    <p class="card-text">
    <img src="https://img.icons8.com/external-icongeek26-glyph-icongeek26/64/000000/external-electricity-power-and-energy-icongeek26-glyph-icongeek26.png"/>  
    These complaints are forwarded from Admin.</p>
    <a href="allpendingbydept.php?department=Electricity" class="btn btn-dark">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingElectricity['num'] ?></a>
    <a href="#" class="btn btn-danger"><?php 
      $dept1='Electricity';
      $num1=$users->numberofpendingtoforward($dept1);
      $forward1=$num1['num'];
      if (!$nopendingElectricity['num']==0){
        $percent1=($forward1/$nopendingElectricity['num'])*100;
       
      }else{
        $percent1=0;
      }
      
      echo number_format($percent1,2,'.','');
      ?> % forwarded</a>
    </div>
</div>
  </div>
  <div class="col-sm-4">
  <div class="card text-white bg-dark mb-3" style="max-width: 23rem;">
  <div class="card-body">
    <h5 class="btn btn-outline-light">PWD</h5>
    <p class="card-text">
    <img src="https://img.icons8.com/ios-glyphs/60/ffffff/road.png"/>  
    These complaints are in progress and yet to be completed.</p>
    <a href="allpendingbydept.php?department=PWD" class="btn btn-outline-light">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingPWD['num'] ?></a>
    <a href="#" class="btn btn-danger"><?php 
      $dept2='PWD';
      $num2=$users->numberofpendingtoforward($dept2);
      $forward2=$num2['num'];
      if (!$nopendingPWD['num']==0){
        $percent2=($forward2/$nopendingPWD['num'])*100;
       
      }else{
        $percent2=0;
      }
      echo number_format($percent2,2,'.','');
      ?> % forwarded</a>

  </div>
</div>
  </div>
  <div class="col-sm-4 ">
  <div class="card text-white bg-success mb-3" style="max-width: 23rem;">
  <div class="card-body">
    <h5 class="btn btn-outline-light">HEALTH</h5>
    <p class="card-text">
    <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-health-medical-kiranshastry-lineal-kiranshastry.png"/>  
    Check the completion report and mark as complete if the report is correct.</p>
    <a href="allpendingbydept.php?department=Health" class="btn btn-dark">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingHealth['num'] ?></a>
    <a href="#" class="btn btn-danger"><?php 
      $dept3='Health';
      $num3=$users->numberofpendingtoforward($dept3);
      $forward3=$num3['num'];
      if (!$nopendingHealth['num']==0){
        $percent3=($forward3/$nopendingHealth['num'])*100;
       
      }else{
        $percent3=0;
      }
      echo number_format($percent3,2,'.','');      
      ?> % forwarded
    </a>
  </div>
</div>
  </div>
</div>

<!-- 2nd row -->
<div class="row">
  <div class="col-sm-4">
    <div class="card text-white bg-secondary mb-3" style="max-width: 21.5rem;">
  
      <div class="card-body">
        <h5 class="btn btn-outline-light">EDUCATION</h5>
          <p class="card-text">
          <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/64/000000/external-education-high-school-flatart-icons-outline-flatarticons.png"/>  
          These complaints are forwarded from Admin.</p>
          <a href="allpendingbydept.php?department=Education" class="btn btn-dark">Check Here</a>
          <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingEducation['num'] ?></a>
          <a href="#" class="btn btn-danger"><?php 
            $dept4='Education';
            $num4=$users->numberofpendingtoforward($dept4);
            $forward4=$num4['num'];
            if (!$nopendingEducation['num']==0){
              $percent4=($forward4/$nopendingEducation['num'])*100;
            }else{
              $percent4=0;
            }
            echo number_format($percent4,2,'.','');            ?> % forwarded
          </a>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
  <div class="card text-white bg-dark mb-3" style="max-width: 23rem;">
  <div class="card-body">
    <h5 class="btn btn-outline-light">FINANCE</h5>
    <p class="card-text">
    <img src="https://img.icons8.com/wired/64/ffffff/card-in-use.png"/>   
    These complaints are in progress and yet to be completed.</p>
    <a href="allpendingbydept.php?department=Finance" class="btn btn-outline-light">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingFinance['num'] ?></a>
    <a href="#" class="btn btn-danger"><?php 
      $dept5='Finance';
      $num5=$users->numberofpendingtoforward($dept5);
      $forward5=$num5['num'];
      if (!$nopendingFinance['num']==0){
        $percent5=($forward5/$nopendingFinance['num'])*100;
      }else{
        $percent5=0;
      }
      echo number_format($percent5,2,'.','');
      ?> % forwarded
    </a>

  </div>
</div>
  </div>
  <div class="col-sm-4 ">
  <div class="card text-white bg-success mb-3" style="max-width: 23rem;">
  <div class="card-body">
    <h5 class="btn btn-outline-light">FOOD & SUPPLY</h5>
    <p class="card-text">
    <img src="https://img.icons8.com/ios/60/000000/wheat.png"/>  
    Check the completion report and mark as complete if the report is correct.</p>
    <a href="allpendingbydept.php?department=Food_supply" class="btn btn-dark">Check Here</a>
    <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingFood_supply['num'] ?></a>
    <a href="#" class="btn btn-danger"><?php 
      $dept6='Food_supply';
      $num6=$users->numberofpendingtoforward($dept6);
      $forward6=$num6['num'];
      if (!$nopendingFood_supply['num']==0){
        $percent6=($forward6/$nopendingFood_supply['num'])*100;

      }else{
        $percent6=0;
      }
      echo number_format($percent6,2,'.','');
            ?> % forwarded
    </a>
  </div>
  </div>
  </div>
</div>
</div>
<div class="row ">
  <div class="col-sm-6 shadow-sm p-3 mb-5 bg-white rounded">
    <div class="card bg-success text-light">
      <div class="card-body">
        <h5 class="btn btn-outline-light">OTHERS</h5>
        <p class="card-text">
        <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-random-interface-kiranshastry-lineal-kiranshastry.png"/>  
        Details of all solved Complaints. </p>
        <a href="allpendingbydept.php?department=Others" class="btn btn-dark">Get the list</a>
        <a href="#" class="btn btn-outline-light">Total : <?php echo $nopendingOthers['num'] ?></a>
        <a href="#" class="btn btn-danger"><?php 
          $dept7='Others';
          $num7=$users->numberofpendingtoforward($dept7);
          $forward7=$num7['num'];

          if (!$nopendingOthers['num']==0){
            $percent7=($forward7/$nopendingOthers['num'])*100;

          }else{
            $percent7=0;
          }
          echo number_format($percent7,2,'.','');
          ?> % forwarded
        </a>

      </div>
    </div>
  </div>
  <div class="col-sm-6 shadow-sm p-3 mb-5 bg-white rounded">
    <div class="card bg-secondary text-light">
      <div class="card-body">
        <h5 class="btn btn-outline-light">ALL PENDING COMPLAINTS</h5>
        <p class="card-text">
        <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-time-delivery-kiranshastry-lineal-kiranshastry.png"/>  
        Details of all Pending Complaints.</p>
        <a href="#" class="btn btn-dark">Get the list</a>
        <a href="#" class="btn btn-outline-light">Total : <?php echo  $allpending['num'] ?></a>
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
      <?php 
        if ($r['official_status']!='Forwarded'){?>
          <a href="pendingtoforward.php?id=<?php echo $r['comp_id'] ?>" class="btn  btn-success">Forward</a>
          <a href="rejectcomp.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-danger">Reject</a>
      <?php }else{ ?>
          <a href="pendingtoforward.php?id=<?php echo $r['comp_id'] ?>" class="btn btn-success">All ready forwarded</a>
        <?php } ?>
    </td>
  </tr>
  <?php } ?> 
   
  </tbody>
</table>

<?php 
    require_once('includes/footer.php');
?>