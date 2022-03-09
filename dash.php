<?php
    require_once 'includes/session.php';
    $title='User-dashboard';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $id=$_SESSION['userid'];
    $results=$users->getcomprecords($id);


?> 
<section class="userform">
       
            <div class="subject">
                <a href="userprofile.php?id=<?php echo $_SESSION['userid'] ?>" class="math">USER<br>PROFILE</a>
                <a href="createcomp.php" class="math">CREATE<br>COMPLAIN</a>
                <a href="applycomp.php?id=<?php echo $_SESSION['userid'] ?>" class="math">CHECK<br>STATUS</a>
            </div>            
        
        <div>
        <div class="subject">
            <table class="table">
        <?php 
            while ($r = $results->fetch(PDO::FETCH_ASSOC)){?>
            <?php
                    $status =$r['status'];
                    $meter_value=0;

                switch ($status) 
                {
                    case "Pending...":
                        $meter_value=30;
                        break;
                    case "processing":
                        $meter_value=75;
                        break;
                    case "solved":
                        $meter_value=100;
                        break;
                    case "Rejected":
                        $meter_value=0;
                        break;
                    default:
                        echo 'Check';
                        break;
                }
            ?>
            <tr>
                <td>Complain Id : <?php echo $r['comp_id'] ?></td>
                <td>Complain status : <?php echo $r['status'] ?></td>
                <td><meter id="status" min="0" max="100" low="30" high="75" 
                value="<?php echo $meter_value ?>" >

                    </meter>
                </td>
                <td>
                    <a class=" btn-outline-primary" href="vieweachrecord.php?id=<?php echo $r['comp_id'] ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                    </svg>

                    </a>
                </td>
                <td>
                    <?php
                        if($r['status']=="solved"){ ?> 
                            <h3 class="text-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                            </svg></h3>
                    
                    <?php } ?>
                    <?php
                        if($r['status']=="processing"){ ?> 
                            <h3 class="text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                        </h3>
                    
                    <?php } ?>

                    <?php
                        if($r['status']=="Rejected"){ ?>
                        <h3 class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
                            <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
                        </svg></h3>
                     <?php } ?>
                     <?php
                        if($r['status']=="Pending..."){ ?>
                        <h3 class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg></h3>
                     <?php } ?>
                </td>
              
            </tr>

            <?php } ?>
            </table>
        </div>
        </div>
        </section>            
                    
                
            
 
    
<?php
    require_once 'includes/footer.php';
?>