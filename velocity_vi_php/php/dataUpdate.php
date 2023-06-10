<?php

include('../connection/conn.php');
// Reading information from the database
include('../views/dashboard.php');


if (isset($_POST['update_username'])) {
    
    // $email = $_POST['search_email'];
    // $email = $_SESSION['email'];

    $username = $_SESSION['username'];
    $currentEmail = $_SESSION['email'];

    $usernameUpdate = $_POST['update_username'];
    $emailUpdate = $_POST['update_email'];
    
    // this is the query to insert into database
    $query = "SELECT `email` FROM `accounts` WHERE `username` = '$username';";
    
    // runs query to database
    $result = mysqli_query($conn, $query);
    $myEmail = mysqli_fetch_assoc($result);

    // checks number of rows returned if not "0" makes email = $value 
    $row = mysqli_num_rows($result);
    
    if ($row == 0) {
		echo ("$username is not found");
	} else {
        if($emailUpdate !== $currentEmail && $usernameUpdate !== $username) {
            // username update
            $query = "UPDATE `accounts` SET `username`= '$usernameUpdate' WHERE `username` = '$username'; ";
            $result = mysqli_query($conn, $query);
            $_SESSION['username'] = $usernameUpdate; 

            // email Update
            $query = "UPDATE `accounts` SET `email`= '$emailUpdate' WHERE `email` = '$currentEmail'; ";
            // runs query to database
            $result = mysqli_query($conn, $query);
            $_SESSION['email'] = $emailUpdate; 
            header('Location: ../views/dashboard.php');
            
        }
       else if ($usernameUpdate !== $username) {
            $query = "UPDATE `accounts` SET `username`= '$usernameUpdate' WHERE `username` = '$username'; ";
            // runs query to database
            $result = mysqli_query($conn, $query);
            $_SESSION['username'] = $usernameUpdate;
            header('Location: ../views/dashboard.php');
           
        } else if($emailUpdate !== $currentEmail){
            $query = "UPDATE `accounts` SET `email`= '$emailUpdate' WHERE `email` = '$currentEmail'; ";
            // runs query to database
            $result = mysqli_query($conn, $query);
            $_SESSION['email'] = $emailUpdate; 
           

            header('Location: ../views/dashboard.php');

        }else if($emailUpdate == $currentEmail && $usernameUpdate == $username) {
            header('Location: ../views/dashboard.php');
        }
        else{
            header('Location: ../views/dashboard.php');
        }

    }
}