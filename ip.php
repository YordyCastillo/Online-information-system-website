if(!empty($_SERVER['HTTP_CLIENT_IP'])){
$ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR])){
$ip = $_SERVER['HTTP_X_FORWARDED_FOR];
}
else{
$ip = $_SERVER['REMOTE_ADDR];
}

echo "<br> Your IP: " ."\n" . $ip ."</br>";
$IPv4 = exlpode(".", $ip);
if(($IPv4[0] == 10 or ($IPv4[0] . "." .$IPv4[1] == "125"))){
echo "<br> You are from Kean University </br>";
}
else{
echo "<br> You are NOT from Kean University</br>";
}