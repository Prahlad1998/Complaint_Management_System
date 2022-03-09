<?php 
    $title='Admin Dashboard';
    require_once('includes/header.php');
    require_once 'db/conn.php';
    $allusers = $users->  numberofallusers();
    $allpending =  $users-> numberofallpending();
    $allprocessing =  $users-> numberofallprocessing();
    $allsolved =  $users->  numberofallsolved();
    $allcomp= $users-> numberoftotalcomplains();
    
?>
<div class="heading1">

    <h2 class="text-center"><?php echo $title ?></h2>
</div>
<section class="header">

 <div class="heading1">
            <div class="subject">
                <a href="allusers.php" class="math">ALL USERS
                    <span class="text-success"> Total Users : </span>
                    <div class="counter h4" data-target="<?php echo $allusers['num'] ?>"></div>
                </a>
                <a href="allpending.php" class="math">PENDING 
                <span class="text-success"> Total Pending : </span>
                <div class="counter h4" data-target="<?php echo $allpending['num'] ?>">
                </div>
                </a>

                <a href="allaccept.php" class="math">ACCEPTED 
                <span class="text-success"> Total Processing : </span> 
                <div class="counter h4" data-target="<?php echo $allprocessing['num'] ?>">
                </div>
                </a>
                <a href="allsolved.php" class="math">SOLVED 
                <span class="text-success"> Total Solved : </span> 
                <div class="counter h4 " data-target="<?php echo $allsolved['num'] ?>">
                </div>
                </a>
            </div>
            <div class="" >
                <div class="subject">
                    <a href="allcomp.php" class="math ">ALL COMPLAINS
                    <span class="text-success "> Total Complains : </span> 
                    <div class="counter h4" data-target="<?php echo $allcomp['num'] ?>">
                    </div>
                    </a>
                </div>
            </div>
 </div>
 </section>
 <!-- <section class="header3">

 <div >
            <div class="subject">
            <a href="adminlogin.php" class="math">OFFICE-LOGIN</a>
            </div>
 </div>
 </section> -->

<?php
    require_once('includes/footer.php');
?>