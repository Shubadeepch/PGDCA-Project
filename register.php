<?php
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $phoneNumber = $_POST['phone'];
    $Address = $_POST['address'];
    $Password = $_POST['password'];

    //Database Connection
    $conn = new mysqli('localhost','root','','users');
    if($conn->connect_error){
        die('connection failed :'.$connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into user(Name, Email, phoneNumber, Address, Password) 
		value(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisi",$Name, $Email, $phoneNumber, $Address, $Password);
        $stmt->execute();
        echo "Registration Successfull.....";
        $stmt->close();
        $conn->close();
    }
    ?>