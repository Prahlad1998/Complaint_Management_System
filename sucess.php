<?php
    $title='success-registration';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if (isset($_POST['submit']))
    {
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $fathername=$_POST['fathername'];
        $dob=$_POST['dob'];
        $aadhar=$_POST['ano'];
        $address=$_POST['address'];
        $dist=$_POST['dist'];
        $subdiv=$_POST['subdiv'];
        $pin=$_POST['pin'];
        $contact=$_POST['cno'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $isSucceess = $crud->insert($fname,$lname,$fathername,$dob,$aadhar,$address,$dist,$subdiv,$pin,$contact,$email,$password);

        if($isSucceess){
            
            echo'<div class="alert alert-success" role="alert">You have been successfully registered!</div>';
        }else{
            echo'<div class="alert alert-danger" role="alert">There is an error in processing !</div>';
        }

    }
    


?>
<div class="card text-dark bg-light mb-3" mb-3" style="max-width: 18rem;">
  <div class="card-header">Registration report</div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $_POST['firstname'].' '. $_POST['lastname']?></h5>
    <h6 class="card-title text-muted"><?php echo$_POST['email']?></h6>
    <h6 class="card-title text-muted"><?php echo$_POST['cno']?></h6>
    <p class="card-text"> <?php echo $_POST['address']?></p>
  </div>
</div>


<?php
    require_once('includes/footer.php');
    
?>