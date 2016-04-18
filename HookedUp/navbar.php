<?php $baseUrl = getClientUrl(); ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?= $baseUrl ?>index.php"><img src="<?= $baseUrl ?>logo_white.png" width="112" height="30"></a>
    </div>
    <ul class="nav navbar-nav">
      <?php if($loggedIn) { ?>
        <li><a href="<?= $baseUrl ?>companies/company.php">Companies</a></li>

        <!-- Search bar -->
        <div class="pull-left">
          <form class="navbar-form" action="<?= $baseUrl ?>search/" method="GET">
            <div class="input-group">
                <input name="filter" class="form-control" placeholder="Search HookedUp">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
          </form>
        </div>
        
        <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>-->
      <?php } ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php if($loggedIn) { ?>
        <li><a href="<?= $baseUrl ?>profile/user.php"><?= getUserFullName(); ?></a></li>
        <li><a id="logoutButton" href="<?= $baseUrl ?>logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      <?php } ?>
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
    </ul>
  </div>
</nav>