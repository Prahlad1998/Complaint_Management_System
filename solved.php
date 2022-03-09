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
      $myDate = date("d-m-y h:i:s");
      
?>
    <h1 class="text-center" ><?php echo $title?></h1>
    <?php
 
echo '<script>alert("To mark as complete you have to submit a valid reason .")</script>';
  
?>
    <div class="alert alert-success" role="alert">You have to make a valid report.</div>;
    
    <section class="userform">
    
    <form action="solvedpost.php" method="post">
    <div class="mb-3">
            <label for="complain_id" class="form-label">Complain Id </label>
            <input type="text" readonly value="<?php echo $user['comp_id'] ?>" class="form-control" id="comp_id" name="comp_id">
        </div>
    
        <div class="mb-3">
            <label for="status" class="form-label">Status </label>
            <input type="text" readonly value="report_submitted" class="form-control" id="status" name="status">
        </div>
        
        <div class="mb-3">
            <label for="solved_report" class="form-label">Solved Report</label>
            <input type="text" required class="form-control" id="solved_report" name="solved_report">
        </div>
        <div class="mb-3">
            <label for="date of solved" class="form-label">Date of Solved :</label>
            <input type="date" class="form-control" id="solved_date" name="solved_date">
        </div>
        <div class="mb-3">
        <input type="submit" class="btn btn-warning" value="Mark as Complete" name="submit">
        </div>
    </form>
    </section>
    

<?php 
    require_once 'includes/footer.php';
?>
