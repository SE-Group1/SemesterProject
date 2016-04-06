<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
    <style>
        .logo-top {
            display: block;
            margin: 50px auto 0 auto;
        }
        .logo-bottom {
            display: block;
            margin: 0 auto 0 auto;
        }
    </style>
    <script>
        $(document).ready(function() {
            console.log("hi");
            $.getJSON("api/feed/index.php", function(data) {
                console.log(data); 
            });
        });
    </script>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <p id="result"></p>
</div>

</body>
</html>
