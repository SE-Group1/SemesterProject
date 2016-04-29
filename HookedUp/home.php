<?php require 'tools.php'; 
    requireLoggedIn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
    <style>
    </style>
    <script>
        $(document).ready(function() {
            $.getJSON("api/feed/index.php", function(data) {
                //console.log(data);
            });
            
            $.ajax({
                url: "api/skill/endorse.php",
                type: "POST",
                data: {
                    'userId': "User-2",
                    "skillId": "Skill-1"
                },
                success: function(data) {
                    $("#result").html(data);
                }
            });
        });
    </script>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <p id="result">
    </p>
</div>

</body>
</html>
