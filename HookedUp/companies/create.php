<!DOCTYPE html>
<html>
    <head>
        <?php require 'links.php'; ?>
        
        <style>
        h2 {
            text-align: center;
        }
        </style>
        
        
    </head>
    
    <body>
        <?php require 'navbar.php'; ?>
        
        <h2>Create Company</h2>
        <form class="form-horizontal">
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
<!--Company Location-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Location">Location</label>  
  <div class="col-md-4">
  <input id="Location" name="Location" type="text" placeholder="Location" class="form-control input-md">
    
  </div>
</div>

<!-- Premium -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Premium">Premium</label>
  <div class="col-md-4">
    <select id="Premium" name="Premium" class="form-control">
      <option value="1">Enabled</option>
      <option value="2">Disabled</option>
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

        
    </body>
</html>