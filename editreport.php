<?php
  $title='Edit Profile';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
   
    if(!isset($_SESSION['officeid']))
        {
            echo 'Please login';
        }
    else
        {
            $id= $_GET['id']; 
            $user = $users->getcomprecordsbycompid($id);
?>
<div class="alert alert-warning" role="alert">You have to make a valid report.</div>;
<!-- navigation -->
<section class="userform">
    
    <form action="editreportpost.php" method="post">
        <div class="mb-3">
            <label for="complain_id" class="form-label">Complain Id </label>
            <input type="text" readonly value="<?php echo $user['comp_id'] ?>" class="form-control" id="comp_id" name="comp_id">
        </div>
    
        <div class="mb-3">
            <label for="status" class="form-label">Status </label>
            <input type="text" readonly value="report_submitted" class="form-control" id="status" name="official_status">
        </div>
        
        <div class="mb-3">
            <label for="solved_report" class="form-label">Solved Report</label>
            <input type="text" required value="<?php echo $user['solved_report'] ?>" class="form-control" id="solved_report" name="solved_report">
        </div>
        <div class="mb-3">
            <label for="date of solved" class="form-label" value="<?php echo $user['solved_date']?>" >Date of Solved :</label>
            <input type="date" class="form-control" id="solved_date" name="solved_date">
        </div>
        <div class="mb-3">
        <input type="submit" class="btn btn-warning" value="Edit Details" name="submit">
        </div>
    </form>
    </section>
    

<!-- table -->
<br>

<?php } ?>

   



<?php
require_once('includes/footer.php');
?>
<!-- <a href= "userreg.php" class="btn btn-info">Create New Account</a> -->