<?php
    

    $con = mysqli_connect("localhost", "root", "Riveros200587!", "ecommerce");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT id,name,username,password,phone,email,address FROM clients WHERE username = ?");
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement,$colId, $colName,$colUsername, $colPassword, $colPhone,$colEmail, $colAddress);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)) {
            $response["success"] = true;  
	$response["id"] = $colId;
            $response["name"] = $colName;
            $response["username"] = $colUsername;
	$response["phone"] = $colPhone;
	$response["email"] = $colEmail;
	$response["address"] = $colAddress;
           
        }
    }

    echo json_encode($response);
?>
