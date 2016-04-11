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
    </style>
        <title>
        
        </title>
    </head>
    <body>
        <?php require 'navbar.php'; ?>
        <div><h2 id="header">Edit Profile</h2></div>
        <img src="bill.jpeg" id="profilepic">

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend></legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Preferred_Name">Preferred Name</label>  
  <div class="col-md-4">
  <input id="Preferred_Name" name="Preferred_Name" type="text" placeholder="John Doe" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Volunteer_Experience">Volunteer Experience</label>  
  <div class="col-md-4">
  <input id="Volunteer_Experience" name="Volunteer_Experience" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Location">Location</label>  
  <div class="col-md-4">
  <input id="Location" name="Location" type="text" placeholder="Columbia" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Education">Education</label>  
  <div class="col-md-4">
  <input id="Education" name="Education" type="text" placeholder="University of Missouri" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Work_Experience">Work Experience</label>  
  <div class="col-md-4">
  <input id="Work_Experience" name="Work_Experience" type="text" placeholder="Software Engineer" class="form-control input-md">
    
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="radios">Gender</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
      Male
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="2">
      Female
    </label>
	</div>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1">Save</label>
  <div class="col-md-8">
    <button id="button1" name="button1" class="btn btn-success">save</button>
    <button id="button2" name="button2" class="btn btn-inverse">Cancel</button>
  </div>
</div>

</fieldset>
</form>

Your Form

    </body>
</html>