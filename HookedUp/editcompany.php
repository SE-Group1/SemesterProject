<!DOCTYPE html>
<html>
    <head>
        <?php require 'links.php'; ?>
    <style>
        #profilepic {
            padding: 10px;   
        }
        
        #header {
            text-align: center;   
        }
        
        .title {
            margin: 50px auto 0 auto;
        }
        
        body {
                background-color: #D8D8D8 
            }
        .row1 {
            background-color: white;
            padding: 10px;
            margin-botton: 10px;
        }
        
        .head {
            text-align: center;
        }
    </style>
        <title>
        
        </title>
    </head>
    <body>
<?php require 'navbar.php'; ?>
        <div id="container">
            <div class="col-md-3" >
                <img src="company.jpeg" class="img-thumbnail">
            </div>
            <div class="col-md-9 row1 comp">
                    <h2 id="company">Company</h2>
                    <div class="clearfix"></div>
                    <div class="location">
                        <div>401 East West Blvd</div>
                        <div>Columbia Missouri, 65203</div>
                            
                    </div>        
                </div>
             </div>
             <div class="row1">
                <div class="col-md-3"></div>
                <div class="col-md-9 row1">
                    <h2 class="head">Edit Company Information</h2>
             
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

<!-- Show Employees-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Premium">Employees</label>
  <div class="col-md-4">
    <select id="Premium" name="Premium" class="form-control">
      <option value="1">Show</option>
      <option value="2">Hide</option>
    </select>
  </div>
</div>


<!-- Save/Cancel Changes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="save" name="submit" class="btn btn-primary">Save</button>
    <button id="cancel" name="submit" class="btn btn-primary">Cancel</button>
  </div>

</fieldset>
</form>
             </div>
             </div>
          </div>

    </body>
</html>