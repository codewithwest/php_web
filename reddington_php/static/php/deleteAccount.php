<?php

include('../connection/conn.php');
// Reading information from the database
include('../views/dashboard.php');

if ($_SESSION['loggedin'] == 1) {
    // $email = $_POST['search_email'];
    // $email = $_SESSION['email'];

    $username = $_SESSION['username'];
    $currentEmail = $_SESSION['email'];
    
    echo "$username";
    // this is the query to insert into database
    $query = "SELECT * FROM `accounts`";
    // runs query to database
    $result = mysqli_query($conn, $query);

    // checks number of rows returned if not "0" makes email = $value 
    $row = mysqli_num_rows($result);
   
    if ($row == 0) {
		echo ("$username is not found");
	} else {
        $queri = "DELETE FROM `accounts` WHERE `username`= '$username'; ";
        $result = mysqli_query($conn, $queri);
        
    // runs query to database
    
    header('Location: ../../index.html');
    }
}