<?php
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    //database connection
    $con = new mysqli ("localhost","root","","users");
    if($con-> connect_error){
            die("failed to connect : ".$con->connect_error);
    } 
    else {
        $stmt = $con->prepare("select * from user where email = ?");
        $stmt->bind_param("s",$email);
        $stmt-> execute();
        $stmt_result=$stmt->get_result();
        if($stmt_result->num_rows>0) {
                $data=$stmt_result->fetch_assoc();
                if($data['Password']=== $password){
                    echo "Login Successfull";
                }
                else{
                    echo"Invalid credential";}

                }

        } 
        ?>
    