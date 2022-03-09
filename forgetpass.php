<?php 
    $title='Create New Password';
    require_once('includes/header.php');
    require_once 'db/conn.php';
?>
 <div class="alert alert-info" role="alert">Create New Password Carefully.</div>
 <br>
 <section class="userform">
 <form action="forgetpasspost.php" method="post">
 <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username"  placeholder="Your Username" name="username">
        </div>
    
        <div class="mb-3">
            <label for="new password" class="form-label">New Password</label>
            <input type="text"   placeholder="Create new password" class="form-control" id="new password" name="new_password">
        </div>
       
        <div class="mb-3">
        <input type="submit" class="btn btn-info" value="Update Password" name="submit">
        </div>  
 </form>
 </section>


<?php 
    require_once('includes/footer.php');

?>