<?php require '../tools.php';
  requireLoggedIn();
  var_dump($_SESSION['id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require '../links.php'; ?>
        
        <style>
        h2 {
            text-align: center;
        }
        </style>
        
        
    </head>
    
    <body>
        <?php require '../navbar.php'; ?>
        
        <h2>Create Company</h2>
        <form class="form-horizontal" action="../api/company/index.php" method="POST">
<fieldset>

<!-- Create Company -->
<legend></legend>

<!-- Company Name-->
<div class="form-group">
  <label class="col-md-4 control-label" for="company_name">Company</label>  
  <div class="col-md-4">
  <input id="company_name" name="company_name" type="text" placeholder="name" class="form-control input-md">
    
  </div>
</div>
<input type="hidden" value="User-1" name="manager">

<!--Company Location-->
<div class="form-group">
  <label class="col-md-4 control-label" for="creditcard">Credit Card Number</label>  
  <div class="col-md-4">
  <input id="creditcard" name="creditcard" type="text" placeholder="Credit Card Number" class="form-control input-md">
    
  </div>
</div>

<!-- Premium -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Premium">Premium</label>
  <div class="col-md-4">
    <select id="Premium" name="Premium" class="form-control">
      <option value="true">Enabled</option>
      <option value="false">Disabled</option>
    </select>
  </div>
</div>

<!-- Create Company -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-primary">Create Account</button>
  </div>

</fieldset>
</form>
<script>
    $( "form" ).submit(function( event ) {
  if ( $( "input:first" ).val() === "correct" ) {
    $( "span" ).text( "Validated..." ).show();
    return;
  }
  </script>

        
    </body>
</html>
