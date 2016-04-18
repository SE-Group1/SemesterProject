<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HookedUp</a>
    </div>
    <ul class="nav navbar-nav">
      <?php if($loggedIn) { ?>
        <li><a href="#">Home</a></li>
        <li><a href="posts.php">Posts</a></li>
        <li><a href="Editprofile.php">Edit Profile</a></li>
        <li><form action="" method="get">
            Search:
            <input type="search" name="filter" value = "<?php echo $filter ?>">
            <input type="submit">
        </form></li>
        
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
        <li><a id="logoutButton" href="#"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
      <?php } ?>
      <!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
    </ul>
  </div>
  <script>
    $("#logoutButton").click(function(e) {
      e.preventDefault();
      
      makeRequest("/api/auth/logout.php", "POST");
    });
  </script>
</nav>