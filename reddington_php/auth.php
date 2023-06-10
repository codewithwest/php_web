<?php
session_start();
$os = strval(php_uname());
if (str_contains($os, 'Windows')) {
    include('static/connection/conn.php');
    echo "one";
}else {
    include('./static/connection/conn.php');
    echo $PHP_OS;
    // echo 'Linux';
}



if (isset($_POST['s-username'])) {
     $uname = $_POST['s-username'];
    $email = $_POST['s-email'];
    $pass = $_POST['s-password'];
    $pass = password_hash($pass, 
          PASSWORD_DEFAULT);
    header('Location: ./index.html');
    
    $query = "INSERT INTO `accounts`(`username`, `email`, `password`) VALUES ('$uname','$email','$pass')";
    //  perform the query
    $result = mysqli_query($conn, $query);
}
if(isset($_POST['username'])) {
    echo "You Have Successfully logged In Welcome to reversed";
    // session_regenerate_id();
    $_SESSION['loggedin'] = TRUE;
    $_SESSION['username'] = $_POST['username'];
   
    $fetchusername = $_SESSION['username'];
    $query = "SELECT `email` FROM `accounts` WHERE `username` = '$fetchusername';";
    // runs query to database
    $result = mysqli_query($conn, $query);
    $myEmail = mysqli_fetch_assoc($result);
    // checks number of rows returned if not "0" makes email = $value 
    $_SESSION['email'] = $myEmail['email'];
    
    header('Location: ./index.html');
   

}


?>