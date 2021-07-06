<? php

include "db_connect.php";

$con = mysqli_connect($server,$username,$password,$dbname)
    or die("cannot connect to database");

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
        
if($result = mysqli_query($con, "select * from Users where login = '$username' and password = '$password'")){
    $row_count = mysqli_num_rows($result);
    if($row_count ==  1){
        $fname = $row["first_name"];
        
        
        
        
        echo "Welcome: " .$fname "\n" .$lname . "<br>;
        
    }
}

?>