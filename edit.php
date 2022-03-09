<?php
  $title='Edit Profile';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
   
    if(!isset($_SESSION['userid']))
        {
            echo 'Please login';
        }
    else
        {
            $id= $_SESSION['id']; 

            $user = $users->viewuser($id);
?>
<!-- navigation -->
<section class="userform">
<form  action="editpost.php" method="post">
    <input type= "hidden" name="reg_id" value="<?php echo $user['reg_id']?>"/>
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name </label>
        <input type="text" value="<?php echo $user['first_name']?>" class="form-control" id="fname" name="fname">
    </div>
    <div class="mb-3">
        <label for="lasttname" class="form-label">Last Name </label>
        <input type="text" value="<?php echo $user['last_name']?>" class="form-control" id="lname" name="lname">
    </div>
    <div class="mb-3">
        <label for="fathername" class="form-label">father Name </label>
        <input type="text"  class="form-control" id="fathername" value="<?php echo $user['father_name']?>" name="fathername">
    </div>
    <div class="mb-3">
        <label for="aadharno" class="form-label">Aadhar No</label>
        <input type="text"  class="form-control" value="<?php echo $user['aadhar_no']?>" id="ano" name="ano">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text"  class="form-control" value="<?php echo $user['address']?>" id="address" name="address">
    </div>
    <div class="mb-3">
        <label for="contact no" class="form-label">contact no</label>
        <input type="text"  class="form-control" value="<?php echo $user['cno']?>" id="cno" name="cno">
    </div>
    <div class="mb-3">
        <label for="pin" class="form-label">Pin no</label>
        <input type="text" value="<?php echo $user['pin']?>" class="form-control" id="pin" name="pin">
    </div>


    <div class="mb-3">
        <input type="submit" class="btn btn-success" value="save-changes" name="submit">
    </div>
</form>
</section>

<!-- table -->
<br>

<?php } ?>

    <div class="userform">
    <a href="dash.php" class="btn btn-danger">Cancel</a>
    </div>



<?php
require_once('includes/footer.php');
?>
<!-- <a href= "userreg.php" class="btn btn-info">Create New Account</a> -->