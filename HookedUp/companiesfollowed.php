<!DOCTYPE html>
<html>
    <head>
        <?php require 'links.php'; ?>
        
    <style>
        body {
            background-color: #D8D8D8
        }
        
        .row1 {
            background-color: white;
        }
        
        h2 {
            text-align: center;
        }
        
        .companies {
            float: left;
            margin-right:20px;
        }
        
    </style>
        
        <title>
        </title>
    </head>
    
    <body>
    <?php require 'navbar.php'; ?>
        <div id="container">
            <div class="col-md-3">
                <img src="bill.jpeg" class="img-thumbnail">
                
            </div><!--End col-md-3 div-->
            
            <div class="col-md-9 row1">
                <h2>Companies Followed By You</h2>
                <hr>
                <?php for($i=1; $i <=5; $i++)  { ?>
                        <img src="company.jpeg" class="img-thumbnail companies">
                        <?php echo "<h3 class='similar'> Company ".$i."</h3>"; ?>
                        <div class="clearfix"></div>
                        <hr>
                    
                    <?php } ?>
                
            </div> <!--End col-md-9 div-->
            
        </div> <!--End container div-->
    
    </body>
</html>