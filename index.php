<?php 
    $title='Index';
    require_once('includes/header.php');
    require_once 'db/conn.php';
?>

    <section class="header">    

        <div class="heading">
            <div class="subject">
                <?php if (!isset($_SESSION['adminid']) and !isset($_SESSION['userid']) and !isset($_SESSION['officeid'])){?>
                                  
                          <a href="login.php" class="math">USER <br>LOGIN</a>
                          <a href="adminlogin.php" class="math">ADMIN <br>LOGIN</a>
                          <a href="loginoffice.php" class="math">OFFICE <br> LOGIN</a>
                <?php }?> 
                <?php if(!isset($_SESSION['adminid']) and isset($_SESSION['userid']) and !isset($_SESSION['officeid'])){?> 

                        <a href="dash.php" class="math"><span class="text-muted">Hello <?php echo $_SESSION['username'] ?></span> User Login</a>
                        <a href="adminnotlogin.php" class="math">ADMIN <br> LOGIN</a>
                        <a href="officenotlogin.php" class="math">OFFICE <br> LOGIN</a>
                <?php }?> 
                <?php if(isset($_SESSION['adminid']) and !isset($_SESSION['userid']) and !isset($_SESSION['officeid'])){?> 

                        <a href="usernotlogin.php" class="math">USER-LOGIN</a>
                        <a href="admindash.php" class="math"><span class="text-muted">Hello <?php echo $_SESSION['username'] ?></span> Admin <br> Login</a>
                        <a href="officenotlogin.php" class="math">OFFICE <br> LOGIN</a>
                <?php }?>
                <?php if(!isset($_SESSION['adminid']) and !isset($_SESSION['userid']) and isset($_SESSION['officeid'])){?> 

                        <a href="usernotlogin.php" class="math">USER <br> LOGIN</a>
                        <a href="adminnotlogin.php" class="math">OFFICE <br> LOGIN</a>
                        <a href="dashoffice.php" class="math"><span class="text-muted">Hello <?php echo $_SESSION['username'] ?></span>  Office Login</a>
                        
                <?php }?>
                    
                        
                <!-- <a href="login.php" class="math">USER-LOGIN</a> -->
                <!-- <a href="adminlogin.php" class="math">OFFICE-LOGIN</a> -->
            </div>
            <!-- <a href="loginoffice.php" class="btn btn-outline-dark">For Office Use</a> -->
            
            <!-- <h1>BACKSLASH TUITION</h1> -->
            <P>Raise a complain against damaged Government property from anywhere anytime !</P>
        </div>
        <div class="">
          
        </div>
    </section>

<?php 
    require_once('includes/footer.php');
?>