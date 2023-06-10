<?php
session_start();

$os = strval(php_uname());
if (str_contains($os, 'Windows')) {
    include('static/connection/conn.php');
    
}else {
    include('./static/connection/conn.php');
    echo $PHP_OS;
    // echo 'Linux';
}

if (isset($_POST['s-username'])) {
    $uname = $_POST['s-username'];
    $email = $_POST['s-email'];
    $pass = $_POST['s-password'];
    
    $query = "INSERT INTO `accounts`(`username`, `email`, `password`, `profileImage`) VALUES ('$uname','$email','$pass', '$uname')";
    //  perform the query
    $result = mysqli_query($conn, $query);
    
    // the message
    $msg = "Hey $uname \nWelcome to reversed we happy to have you join our community";

    // use wordwrap() if lines are longer than 70 characters
    // $msg = wordwrap($msg,70);

    // send email
    // mail("$email","Registration Confirmation",$msg);
    $headers = "From: jonaslekgau@gmail.com\r\n";
    // $headers .= "Reply-To: myplace2@example.com\r\n";
    // $headers .= "Return-Path: myplace@example.com\r\n";
    // $headers .= "CC: sombodyelse@example.com\r\n";
    // $headers .= "BCC: hidden@example.com\r\n";

if ( mail( 'lekgaujonas@gmail.com', "Auth",$msg,$headers) ) {
    echo "The email has been sent!";
    header('Location: ./');
    } else {
    echo "The email has failed!";
    }
    

    
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
    
    header('Location: ./static/views/dashboard.php');
   

}
 


?>