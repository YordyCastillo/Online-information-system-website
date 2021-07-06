<?php

include "db_connect.php";

$con=mysqli_connect($server,$username,$password,$dbname)
    or die("cannot connect to database");

$username = $_POST['username'];
$password = $_POST['password'];

if($result = mysqli_query($con, "select * from Users where login = '$username' and password = '$password'"))
    $row_count = mysqli_num_rows($result);
    if($row_count == 1){ 
            while ($row = mysqli_fetch_assoc($result)){
   if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
                                          }
elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    echo "<br> Your IP: " ."\n" . $ip ."</br>";
    $IPv4 = explode(".", $ip);
    if(($IPv4[0] == 10 or ($IPv4[0] . "." .$IPv4[1] == "125"))){
        echo "<br> You are from Kean University </br>";
            }
            else{
            echo "<br> You are NOT from Kean University</br>";
                } 
    ?>      
        <html>
            
        <head>
        <title>Users data</title>
        </head>
        <body>
        <table width="600" border="1"
        cellpadding="1" cellspacing="1">                 <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Address</th>
            <th>State</th>
            <th>Zipcode</th>
            
        <tr>
            <?php
        echo "<tr>";
        echo "<td>".$row['first_name']."<\td>";
        echo "<td>".$row['role']."<\td>";
        echo "<td>".$row['address']."<\td>";
        echo "<td>".$row['zipcode']."<\td>";
        echo "<td>".$row['state']."<\td>";
        echo "<\tr>";
    }
        
                                }
    
 
else {
    header("location: cps3740_p1.html");       
    }

    
?>