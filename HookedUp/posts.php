<!DOCTYPE html>
<html>
    <head>
        <?php require 'links.php'; ?>
    <style>
        
            .post {
 
                text-align: center;   
            }
        
            .btn btn-success {
                align: right;
                padding:20px;
            }
        
            .text {
                
                border: 1px solid black;
                auto-align: right;
                padding: 10px;
                margin:10px;
                display: inline-block;
            }   
            .form-control {
                resize: none;   
            }
        
            #profilepic {
                margin: 10px;   
            }
            
        #posts {
            margin-right: 50px;
            margin-left: 100px;
            border: 1px solid black;
            padding:10px;
        }
        
        .postpic {
            margin: 10px; 
            float: left;
        }

        .column {
           vertical-align: middle;
        
        hr {
            border-width: 2px;   
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
            <img src="bill.jpeg" id="profilepic">
        
            <div class="container">
                <h2 class="post">New post</h2>
                
                <form role="form">
                    <div class="form-group">
                    <label for="comment">Post:</label>
                    <textarea placeholder="What's on your mind?" class="form-control" rows="5" id="comment"></textarea>
                        <button type="button" class="btn btn-success">Post</button>
                    </div>
                    <h2 class ="post" text-align="center">Previous Posts</h2>
                    <div id="posts">
                        <?php
                            for($i=0; $i < 10; $i++) { ?>
                                <div><img src="bill.jpeg" class="col-md-4" class="column">
                                <div class="col-md-6" class="column"> Lorem ipsum dolor sit amet, aenean porta nec velit, lectus posuere, tortor quamt fasdjlskfjas a kgjasdl ajsflaksd fkj lkjf asdlfjas fsjf  sdfkjasf asfjijfaslkfj skfjsdf sdjf lkdjfasd flkajf </div>
                                <button type='button' class="btn btn-success" class="col-md-2" class="column">Delete</button>
                                <div class='clearfix'></div>
                                </div><hr>
                            <?php }
                        ?>
                    
                    </div>
                </form>
            </div>
    
    </body>
</html>