<?php 
    $title='Sign-up';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
?>


<h1 class="text-center"><?php echo $title;?></h1>
<br>
<section class="userform">
<form  action="signupafter.php" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" required class="form-control" id="username" name="username" placeholder="make sure username should be unique">
    </div>
    <div class="mb-3">
        <label for="email"  required class="form-label">Email</label>
        <input type="email" placeholder="Your email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password </label>
        <input type="password" placeholder="create password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="firstname" class="form-label">First Name </label>
        <input type="text" placeholder="Your First name" class="form-control" id="fname" name="fname">
    </div>
    <div class="mb-3">
        <label for="lasttname" class="form-label">Last Name </label>
        <input type="text" placeholder="Your last  name" class="form-control" id="lname" name="lname">
    </div>
    <div class="mb-3">
        <label for="fathername" class="form-label">father Name </label>
        <input type="text"  class="form-control" id="fathername" name="fathername">
    </div>
    <div class="mb-3">
        <label for="aadharno" class="form-label">Aadhar No</label>
        <input type="text"  class="form-control" id="ano" name="ano">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text"  class="form-control" id="address" name="address">
    </div>
    <div class="mb-3">
        <label for="contact no" class="form-label">contact no</label>
        <input type="text"  class="form-control" id="cno" name="cno">
    </div>
    <div class="mb-3">
        <label for="pin" class="form-label">Pin no</label>
        <input type="text"  class="form-control" id="pin" name="pin">
    </div>


    <div class="mb-3">
        <input type="submit" class="btn btn-dark"  name="submit">
    </div>
</form>
</section>
<br>



<?php 
    require_once 'includes/header.php';
?>