<title>HookedUp</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<style>   
    body {
        background-color: #EFEFEF 
    }
    hr {
        border-color: #aaa; 
    }
    .card {
        background-color: white;
        border-color: #ddd;
        border-radius: 1px;
        padding: 15px;
    }
    .shadow {
        box-shadow: 0px 2px 4px #999;
    }
    .no-margin {
        margin: 0px;
    }
    .no-padding {
        padding: 0px;
    }
    .no-spacing {
        margin: 0px;
        padding: 0px;
    }
</style>

<script>
    function redirect(urlPart) {
        window.location.href = "<?= getClientUrl(); ?>" + urlPart;
    }
    
    function makeRequest(urlPart, method, params = []) {
       
        var url = "<?= getAPIUrl(); ?>" + urlPart;
        
    }
</script>