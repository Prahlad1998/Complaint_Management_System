<?php 
    $title='Create Complain';
    require_once('includes/header.php');
    require_once 'db/conn.php';
     
    if(!isset($_SESSION['userid']))
        {
            echo 'Please login';
        }
    else
        {
            $id= $_SESSION['userid']; 
            $user = $users->viewuser($id);
        }
?>

<h2 class="text-center"><?php echo $title ?></h2>
<br>
<form action="postcompreg.php" method="post">
   
    <section class="userform">
    <label for="reg_id" class="form-label">User Profile ID : Auto generated,cannot be changed.</label>

    <input type="text"  readonly value="<?php echo $user['reg_id']?>" class="form-control" id="reg_id" name="reg_id">

    <div class="mb-3">
        <h4>Complain Details :</h4>
    </div>
    
    <div class="mb-3">
    <label for="comp-sub" class="form-label">Subject of your Complain :</label>
    <input type="text" required class="form-control" id="comp-sub" name="comp_sub">
  </div>
  <div class="mb-3">
    <label for="comp-sub" class="form-label">Category of department :</label>
    <select class="form-select" required  aria-label="Default select example" name="Department" id="Department">
      <option selected>Select</option>
      <option value="Electricity">Electricity</option>
      <option value="PWD">PWD</option>
      <option value="Health">Health</option>
      <option value="Education">Education</option>
      <option value="Finance">Finance</option>
      <option value="Food_supply">Food & Supply</option>
      <option value="Others">Others</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="comp-summary" class="form-label">Summary of Complain :</label>
   <input type="text" required  class="form-control" id="comp-summary" name="comp_summary">
  </div>
    </section>

    <section class="userform">
    <div class="mb-3">
        <h4>Location:</h4>
    </div>
    <div class="mb-3">
    <label for="comp-loaclity" class="form-label">Locality :</label>
    <input type="text" required class="form-control" id="comp-locality" name="comp_locality">
  </div>
  <div class="mb-3">
    <label for="comp-address" class="form-label">Address :</label>
    <input type="text" required  class="form-control" id="comp-address" name="comp_address">
  </div>
  <div class="mb-3">
    <label for="comp-district" class="form-label">District :</label>
    <input type="text" required class="form-control" id="comp-district" name="comp_district">
  </div>
  <div class="mb-3">
    <label for="comp-sdo" class="form-label">Sub-Division :</label>
    <input type="text" required class="form-control" id="comp_sdo" name="comp_sdo">
  </div>
    </section>

    <!-- <div class="mb-3">
    <label for="comp-file" class="form-label">Related Photo :</label>
    <input type="file"  disabled class="form-control" id="comp-file" name="comp-file">
  </div> -->
  <!-- <div class="mb-3">
    <label for="comp-summary" class="form-label">Summary of Complain :</label>
   <input type="text" class="form-control" id="comp-summary" name="comp-summary">
  </div> -->
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </section>
    
  
  
</form>

<?php 
    require_once('includes/footer.php');
?>