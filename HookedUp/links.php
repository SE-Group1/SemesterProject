<title>HookedUp</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    function redirect(urlPart) {
        window.location.href = "<?= getClientUrl(); ?>" + urlPart;
    }
    
    function makeRequest(urlPart, method, params = []) {
       
        var url = "<?= getAPIUrl(); ?>" + urlPart;
        
    }
</script>