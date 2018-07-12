<?php
   

    $connect = mysqli_connect("localhost", "root", "Riveros200587!", "ecommerce");



    
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $birtdate = $_POST["birtdate"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $neigboorhood = $_POST["neigboorhood"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];

     function registerUser() {
        global $connect, $name, $age, $username, $password;
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $statement = mysqli_prepare($connect, "INSERT INTO clients (name, lastname, birth, username, password, address, city, neighborhood, phone, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
        mysqli_stmt_bind_param($statement, "ssssssssss", $name, $lastname, $birtdate ,$username, $passwordHash, $address, $city, $neigboorhood, $phone, $mail);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);     
    }

    function usernameAvailable() {
        global $connect, $username;
        $statement = mysqli_prepare($connect, "SELECT * FROM clients WHERE username = ?"); 
        mysqli_stmt_bind_param($statement, "s", $username);
        mysqli_stmt_execute($statement);
        mysqli_stmt_store_result($statement);
        $count = mysqli_stmt_num_rows($statement);
        mysqli_stmt_close($statement); 
        if ($count < 1){
            return true; 
        }else {
            return false; 
        }
    }

    $response = array();
    $response["success"] = false;  

    if (usernameAvailable()){
        registerUser();
        $response["success"] = true;  
    }
    
    echo json_encode($response);
?>
