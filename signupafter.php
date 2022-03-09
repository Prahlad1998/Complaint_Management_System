<?php 
    $title='Index';
    require_once('includes/header.php');
    require_once 'db/conn.php';

    if (isset($_POST['submit']))
    {
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $fname=$_POST['fname'];
        $laname=$_POST['lname'];
        $fathername=$_POST['fathername'];
        $ano=$_POST['ano'];
        $address=$_POST['address'];
        $cno=$_POST['cno'];
        $pin=$_POST['pin'];


        
        $isSucceess = $users->insert($username,$email,$password,$fname,$laname,$fathername,$ano,$address,$cno,$pin);

        if($isSucceess){
            $results=$users->userdetails($username,$email);
            $num=$results['id'];
            $string1=strtoupper(substr($results['first_name'],0,1));
            $string2=strtoupper(substr($results['last_name'],0,1));

            $new_id=$string1.$string2.'000'.$num;
            $users->updateuserid($num,$new_id);
            echo'<div class="alert alert-success" role="alert">You have been successfully registered!</div>';
        }else{
            echo'<div class="alert alert-danger" role="alert">There was an error in processing!</div>';
        }

    }
?>

<div class="alert alert-primary">
    <a class="btn btn-primary" href="login.php">Back to Signin page</a>
</div>





<?php
    require_once('includes/footer.php');
    
?>