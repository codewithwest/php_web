<?php
include('../connection/conn.php');
 


if (isset($_POST['update_password'])) {
    $currentEmail = $_POST['pass_email'];
    $newPassword = $_POST['update_password'];
    $query = "UPDATE `accounts` SET `password`= '$newPassword' WHERE `email` = '$currentEmail'; ";
            $result = mysqli_query($conn, $query);
            header('Location: ../../index.html');
            // $_SESSION['username'] = $usernameUpdate;
}
?>