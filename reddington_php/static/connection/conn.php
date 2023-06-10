<?php
$dbservername ='localhost';
$dbusername = 'root';

$os = strval(php_uname());
if (str_contains($os, 'Windows')) {
    $dbpassword = '';
}else {
    $dbpassword='root';
    // echo 'Linux';
}

$dbname = 'post_app';

$conn = mysqli_connect($dbservername, $dbusername,$dbpassword);
mysqli_select_db($conn, $dbname);

// Check connection
if (!$conn) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>