<?php
    //Essentially cut and pastes the tools.php file here.
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    
    //For GET requests, use tools.getGETSafe() to retrieve request data.
    $username = getGETSafe('username');
    
    //For POST requests, use tools.getPOSTSafe() to retrieve request data.
    $password = getPOSTSafe('password');
    
    
    //Gets a mysql object instance.
    $conn = mysqlConnect();
    
    
    /**
     * 1. RETURNING A LIST
     */////////////////////////////////
    
    //Set up your query (you should test this directly in the terminal before proceeding to make sure it works).
    $query = "SELECT * FROM user";
    
    //Prepare the query using the mysqli connection (returns a mysqli_stmt object instance).
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        failure("Prepare failed: " . $conn->error);
    }
    
    //Execute the query (this is when the query is actually run in mysql).
    if (!$stmt->execute()) {
        failure("Execute failed: " . $stmt->error);
    }
    
    //Get the result of the execution (returns a mysqli_result object instance).
    $result = $stmt->get_result();

    //Create a PHP array and iterate through the rows, fetching associate arrays for each row and adding them to the list
    $array = array();
    while($row = $result->fetch_assoc()) {
        array_push($array, $row);
    }

    //Return the list using tools.success (this will encode the JSON for you).
    success($array);
    
    
    /**
     * 2. GETTING ONE ENTITY GIVEN AN ID
     */////////////////////////////////
     
    //Get the id from the request
    $id = getGETSafe('id');
    
    //Set up your query (you should test this directly in the terminal before proceeding to make sure it works).
    //mysqli will replace question marks (?) with data later when we bind
    $query = "SELECT * FROM user WHERE id = ?";
    
    //Prepare the query using the mysqli connection (returns a mysqli_stmt object instance).
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        failure("Prepare failed: " . $conn->error);
    }
    
    //Execute the query (this is when the query is actually run in mysql).
    if (!$stmt->execute()) {
        failure("Execute failed: " . $stmt->error);
    }
    
    //Store the result for use by mysqli 
    if (!$stmt->store_result()) {
        failure("Store failed: " . $stmt->error);
    }
    
    //Tell mysqli to fetch the first row (there should only be one).
    if (!$stmt->fetch()) {
        failure("Fetch failed: " . $stmt->error);
    }
    
    //Get the result of the execution (returns a mysqli_result object instance).
    $result = $stmt->get_result();
    
    //Get an associate array for the user
    $user = $result->fetch_assoc();
    
    //If the array is null, there is no user in the database with that id
    if(!$user) {
        failure("No user for id: " . $id);
    }
    
    //Return the user array
    success($user);
?>