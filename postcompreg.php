<?php 
    $title='Report of Regestered Complain';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        $reg_id=$_POST['reg_id'];
        $comp_sub=$_POST['comp_sub'];
        $Department=$_POST['Department'];
        $comp_summary=$_POST['comp_summary'];
        $comp_locality=$_POST['comp_locality'];
        $comp_address=$_POST['comp_address'];
        $comp_district=$_POST['comp_district'];
        $comp_sdo=$_POST['comp_sdo'];

        $isSucceess=$users->compinsert($reg_id,$comp_sub,$Department,$comp_summary,$comp_locality,$comp_address,$comp_district,$comp_sdo);

        if($isSucceess){
          $number=$users->getlastvalueofid();
          $num1= $number['id'];
          $results=$users->getcomprecordsbycompautoid($num1);
          $department= $results['Department'];
          $string=substr($department,0,3);
          $new_id=strtoupper($string).date('Y').date('m').'0'.$num1;
            $users->updateid($num1,$new_id);
            echo'<div class="alert alert-success" role="alert">Your complain has been successfully registered!</div>';
        }else{
            echo'<div class="alert alert-danger" role="alert">There was an error in processing!</div>';
        }


    }else{
        echo'<div class="alert alert-danger" role="alert">There was an error in processing!</div>';
    }

?>
<h2 class="text-center">Report of Complain Registration</h2>

<table class="table">
  <!-- <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead> -->
  <tbody>
    <tr>
      <th scope="row">User Profile ID</th>
      <td><?php echo $_POST['reg_id']?></td>
      
    </tr>
    <tr>
      <th scope="row">Subject of Complain</th>
      <td><?php echo$_POST['comp_sub']?></td>
    </tr>
    <tr>
      <th scope="row">Department</th>
      <td><?php echo$_POST['Department']?></td>
    </tr>
    <tr>
      <th scope="row">Summary of Complain</th>
      <td ><?php echo$_POST['comp_summary']?></td>
    </tr>
    <tr>
      <th scope="row">Locality</th>
      <td><?php echo$_POST['comp_locality']?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo$_POST['comp_address']?></td>
    </tr>
    <tr>
      <th scope="row">District</th>
      <td><?php echo$_POST['comp_district']?></td>
    </tr>
    <tr>
      <th scope="row">Sub-Division</th>
      <td><?php echo$_POST['comp_sdo']?></td>
    </tr>
  </tbody>
</table>
<br>
<div class="alert alert-primary">
    <a class="btn btn-primary" href="dash.php">Back to DashBoard</a>
</div>



<?php 
    require_once 'includes/header.php';
?>