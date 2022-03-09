<?php 
    $title='Login warning';
    require_once('includes/header.php');
    require_once 'db/conn.php';
?>
 <div class="alert alert-danger" role="alert">You Can not login now, as you are logged in with profile user-name <span class="text-muted"><?php echo $_SESSION['username'] ?></span>.</div>
<a href="logout.php" class="btn btn-info">Logout now</a>

<?php 
    require_once('includes/footer.php');

?>