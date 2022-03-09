<?php
    $title= 'Officer Login';
    require_once 'includes/header.php';
    require_once 'db/conn.php'; 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $department=$_POST['Department'];
        $username=strtolower(trim($_POST['username'])); 
        $password=$_POST['password'];
        $new_password = md5($password.$username);
        $results = $users->getofficeuser($department,$username,$password);
        if(!$results){
            
            echo '<div class="alert alert-danger" role="alert"> Check the username and password and try again</div>';
        }else{
            $_SESSION['department']= $results['office_department'];
            $_SESSION['username']=$username;
            $_SESSION['officeid']= $results['office_id'];
           
            header("location:dashoffice.php");
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
            <td>
                <label for="comp-sub" class="form-label">
                    Category of department* :    
                </label>
            </td>
            <td>
                <select class="form-select" aria-label="Default select example" name="Department" id="Department">
                    <option selected>Select your department here *</option>
                    <option value="Electricity">Electricity</option>
                    <option value="PWD">PWD</option>
                    <option value="Health">Health</option>
                    <option value="Education">Education</option>
                    <option value="Finance">Finance</option>
                    <option value="Food_supply">Food & Supply</option>
                    <option value="Others">Others</option>
                </select>
            </td>
        </tr>
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
        <input type="Submit" class="btn btn-primary " name="submit" style=" display:flex;justify-content:center; align-items:center;margin:0 auto;" value="Login">
        
    <br/>
    
</form>



<?php
  require_once 'includes/footer.php';
?>