<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
    <style>
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
