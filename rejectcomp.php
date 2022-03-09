<?php
      $title='Index';
      require_once 'includes/header.php';
      require_once 'db/conn.php';
      if(!$_GET['id']){
          echo 'error';
      }else{
          $id=$_GET['id'];
         $user=$users->getcomprecordsbycompid($id);
      }
      
?>
    <h1 class="text-center" ><?php echo $title?></h1>
    <?php
 
echo '<script>alert("For Rejection you have to submit a valid reason .")</script>';
  
?>
    <div class="alert alert-danger" role="alert">For Rejection you have to submit a valid reason .</div>;
    
    <section class="userform">
    
    <form action="rejectcomppost.php" method="post">
    <div class="mb-3">
            <label for="complain_id" class="form-label">Complain Id </label>
            <input type="text" readonly value="<?php echo $user['comp_id'] ?>" class="form-control" id="comp_id" name="comp_id">
        </div>
    
        <div class="mb-3">
            <label for="status" class="form-label">Status </label>
            <input type="text" readonly value="Rejected" class="form-control" id="status" name="status">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Official Status </label>
            <input type="text" readonly value="Rejected" class="form-control" id="official_status" name="official_status">
        </div>
        <div class="mb-3">
            <label for="reject_reason" class="form-label">Rejected_Reason</label>
            <input type="text" required class="form-control" id="rejection_reason" name="rejection_reason">
        </div>
        <div class="mb-3">
        <input type="submit" class="btn btn-danger" value="Reject" name="submit">
        </div>
    </form>
    </section>
    

<?php 
    require_once 'includes/footer.php';
?>
