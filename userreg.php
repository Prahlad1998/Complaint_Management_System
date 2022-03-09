<?php
  $title='User-registration';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
?>
<!-- navigation -->

<nav class="navbar">
            <div class="logo">
                COM<span>.PLAIN</span>
            </div>
            <div class="nav-links">
                <ul class="main-nav">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#" class="">ABOUT-US</a></li>
                    <li><a href="#" class="">HOW IT WORKS</a></li>
                    <li><a href="#" class="">QUERY</a></li>
                    <div class="login">
                    <li><a href="login.php" class="login-btn" >LOGIN</a></li>
                    </div>
                   
                </ul>
            </div>
        </nav>
<!-- table -->
<br>
<section class="userform">
<form  action="sucess.php" method="post">
    <div class="mb-3">
        <label for="First Name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="First name" name="firstname">
    </div>
    <div class="mb-3">
        <label for="last Name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last Name" name="lastname">
    </div>
    <div class="mb-3">
        <label for="father's Nmae" class="form-label">Father's Name </label>
        <input type="text" class="form-control" id="Father's Name" name="fathername">
    </div>
    <div class="mb-3">
        <label for="date of birth" class="form-label">Date Of Birth</label>
        <input type="date" class="form-control" id="Date Of Birth" name="dob">
    </div>
    <div class="mb-3">
        <label for="Aadhar Number" class="form-label">Aadhar Number</label>
        <input type="number" class="form-control" id="Aadhar Number" name="ano">
    </div>
    <div class="mb-3">
        <label for="Address" class="form-label">Address</label>
        <input type="text" class="form-control" id="Address" name="address">
    </div>
    <div class="mb-3">
        <label for="District" class="form-label">District</label>
        <input type="text" class="form-control" id="District" name="dist">
    </div>
    <div class="mb-3">
        <label for="Sub-Division" class="form-label">Sub-Division</label>
        <input type="text" class="form-control" id="Sub-Division" name="subdiv">
    </div>
    <div class="mb-3">
        <label for="Pin Number" class="form-label">Pin Number</label>
        <input type="number" class="form-control" id="pin number" name="pin">
    </div>
    <div class="mb-3">
        <label for="Contact Number" class="form-label">Contact Number</label>
        <input type="number" class="form-control" id="Contact Number" name="cno">
    </div>
    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
        
    </div>
    <div class="mb-3">
        <label for="Password1" class="form-label"> Create New Password</label>
        <input type="password" class="form-control" id="Password" name="password">
    </div>

    <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
</form>
</section>

    <div class="userform">
    <a href="userlogin.php" class="btn btn-danger">Cancel</a>
    </div>



<?php
require_once('includes/footer.php');
?>
<!-- <a href= "userreg.php" class="btn btn-info">Create New Account</a> -->
Lorem ipsum dolor sit amet consectetur, adipisicing elit. Harum ad provident nesciunt numquam sint cum earum maxime ex eveniet reiciendis.