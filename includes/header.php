<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">  
          <!-- Bootstrap -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title?></title>
</head>

<body>
<nav class="navbar">
            <div class="logo">
                COM<span>.PLAIN</span>
         
            </div>
            <?php if(isset($_SESSION['adminid'])){?>
                <form class="d-flex " action="viewbyidadminuser.php" method="post">
        
                <input class="form-control" type="search" placeholder="Type the complaint Id :" aria-label="Search" name="comp_id">

                <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
            </form>
            <?php } ?>
            
            <div class="nav-links">
                <ul class="main-nav">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="#" class="">ABOUT-US</a></li>
                    <li><a href="#" class="">HOW IT WORKS</a></li>
                    <li><a href="#" class="">QUERY</a></li>
                    <div class="login">
                    <li>
                    <?php 
                        if(!isset($_SESSION['adminid']) and !isset($_SESSION['officeid']) and !isset($_SESSION['userid'])){?>
                            <a href="login.php" class="login-btn" >LOGIN</a></li>
                        <?php } ?>  
                           
                    <?php 
                        if(!isset($_SESSION['adminid']) and !isset($_SESSION['officeid'])){?>
                            <?php if(isset($_SESSION['userid'])){?>
                                <li>
                                <a href="dash.php" class="btn "><span class="text-muted">Hello <?php echo $_SESSION['username'] ?></span></a>
                            <a href="logout.php" class="login-btn" >LOGOUT</a></li>
                            </li>
                        <?php }?>      
                        <?php }?>

                        <?php 
                            if(!isset($_SESSION['userid']) and !isset($_SESSION   ['officeid'])){?>
                            <?php if(isset($_SESSION['adminid'])){?>
                                <li>
                                <a href="admindash.php" class="btn "><span class="text-muted">Hello <?php echo $_SESSION['username'] ?></span></a>
                            <a href="logout.php" class="login-btn" >LOGOUT</a></li>
                            </li>
                        <?php }?>  
                            <?php }?>

                        <?php if(!isset($_SESSION['userid']) and !isset($_SESSION['adminid'])){?>
                            <?php if(isset($_SESSION['officeid'])){?>
                                <li>
                                <a href="dashoffice.php" class="btn "><span class="text-muted">Hello <?php echo $_SESSION['username'] ?></span></a>
                            <a href="logout.php" class="login-btn" >LOGOUT</a></li>
                            </li>
                        <?php } ?>  
                            <?php }?>

                       

                         
                        
                    
                    
                    <!-- <li><a href="login.php" class="login-btn" >LOGIN</a></li> -->
                    </div>
                   
                </ul>
            </div>
        </nav>
    

    
