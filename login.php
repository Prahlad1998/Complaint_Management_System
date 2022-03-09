<?php
    $title= 'User Login';
    require_once 'includes/header.php';
    require_once 'db/conn.php'; 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username=strtolower(trim($_POST['username'])); 
        $password=$_POST['password'];
        $new_password = md5($password.$username);
        $results = $users->getuser($username,$password);
        if(!$results){
            echo '<div class="alert alert-danger" role="alert"> Check the username and password and try again</div>';
        }else{
            $_SESSION['username']=$username;
            $_SESSION['userid']= $results['reg_id'];
            header("location:dash.php");
        }
    }   
?>

<br/>


<br/>
<h2 class="text-center"><?php echo $title?></h2>

<br/>

<form method= "post" action="<?php echo htmlentities($_SERVER['PHP_SELF'])?>">
    <table class="table " style="width:70%; margin:0 auto;"> 
        <tr>
            <td><label for="username">Type your Username* :</label></td>
            <td>
                <input type="text" name="username" class="form-control" id="username" value="<?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['username'];?>">
            </td>
        </tr>
        <tr>
            <td><label for="password">Password* :</label></td>
            <td><input type="password" name="password" class="form-control" id="password" value=""></td>
        </tr>
    </table><br/>
        <input type="Submit" class="btn btn-primary " name="submit" style=" display:flex;justify-content:center; align-items:center;margin:0 auto;" value="SignIn">
        
    <br/>
    <a href="signup.php"  class="btn btn-warning">Signup</a>
    <br>
</form>

<a href="forgetpass.php" style=" display:flex;justify-content:center; align-items:center;margin:0 auto;">Forget Password ?</a>

<?php
  require_once 'includes/footer.php';
?>