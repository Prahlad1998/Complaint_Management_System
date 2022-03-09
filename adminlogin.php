<?php
    require_once 'includes/header.php';
    $title= 'Admin Login';
   
    require_once 'db/conn.php'; 

  
    // now check if the data are coming from the post action or not
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username=strtolower(trim($_POST['username'])); // here strtolower is used for lower the all letters and trim is used for cut the white spaces from post of username
        $password=$_POST['password'];
        $new_password = md5($password.$username);
        $results = $users->getadmin($username,$password);
        if(!$results){
            echo '<div class="alert alert-danger" role="alert"> Check the username and password and try again</div>';
        }else{
            $_SESSION['username']=$username;
            $_SESSION['adminid']= $results['admin_id'];
            header("location: admindash.php");
        }
    }   
?>
<br/>
<br/>
<h2 class="text-center"><?php echo $title?></h2>
<!-- here the htmlentities(reduce the exploitation) and server and super variable PHP_SELF ,Using PHP_SELF the page will be reloaded in the same page -->
<br/>
<br/>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>" method="post" >
    <table class="table " style="width:70%; margin:0 auto;"> 
        <tr>
            <td><label for="username">Type your Username* :</label></td>
            <td>
                <input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['username'];?>">
            </td>
        </tr>
        <tr>
            <td><label for="password">Password* :</label></td>
            <td><input type="password" name="password" class="form-control" id="username" value=""></td>
        </tr>
    </table>
    <br/>
    <br/>
        <input type="Submit" class="btn btn-primary " name="submit" style=" display:flex;justify-content:center; align-items:center;margin:0 auto;">
        <br/>
    <br/>
         <a href="#" style=" display:flex;justify-content:center; align-items:center;margin:0 auto;">Forget Password ?</a>

</form>