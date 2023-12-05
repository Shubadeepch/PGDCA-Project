<?php
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $problem = $_POST['problem'];
    $address= $_POST['address'];

    //Database Connection
    $conn = mysql('localhost','root','','users');
    if($conn->connect_error){
        die('connection failed :'.$connect_error);
    }
    else{
        $stmt =$conn->prepare("insert into bookings(service,date,time,problem,'address')value(?,?,?,?,?)");
        $stmt->bind_param("siiss",$service,$date,$time,$problem,$address);
        $stmt->execute();
        echo "Booking Successfull.....";
        $stmt->close();
        $conn->close();
    }
    ?>