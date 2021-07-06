<?php
 // Starting Session
session_start();
$error=' ';
if (isset($_POST['Submit'])) {
include 'db_connect.php';
if (empty($_POST['username']) || empty($_POST['password'])) {
 $error= "username or password  invalid";
}
else {

$username = $_POST['username'];
$password = $_POST['password'];
$con=mysqli_connect($server, $login, $password, $dbname);
$username = stripslashes($username);
$password = stripslashes($password);
$password = mysqli_real_escape_string($password);
$db= mysqli_select_db('Users', $con);
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query("select * from Users where password='$password' AND username='$username'", $con);
$rows = mysqli_num_rows($query);

if ($rows ==1){

$_SESSION['login_user'] = $username; // Initializing Session
 header("location: profile.php"); // Redirecting To Other Page
}else{
$error ="usename or password is invalid";}

mysqli_close($con); // Closing Connection
}
}
?>
