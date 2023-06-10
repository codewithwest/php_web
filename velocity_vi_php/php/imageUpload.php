<?php



include('../connection/conn.php');
include('../views/dashboard.php');
$username = $_SESSION['username'];
$filename = $_FILES['profileImage']['name'];
$tempname = $_FILES["profileImage"]['tmp_name'];
$type = $_FILES["profileImage"]['type'];

    //$folder = "/" . $filename;
    $currentDir = dirname(__FILE__);
 
    $os = strval(php_uname());
if (str_contains($os, 'Windows')) {
    $folder = $currentDir."/../assets/userProfile/$username.png";
}else {
     
        $folder = $currentDir."/../assets/userProfile/$username.png";
}
    $query = "UPDATE `accounts` SET `profileImage` = '$username.png' WHERE `accounts`.`email` = 'jonaslekgau@gmail.com'; ";

    // Execute query
    // $temp = is_uploaded_file($_FILES["profileImage"]['tmp_name']);
    $result =  mysqli_query($conn, $query);
    // echo $temp;
    if (is_uploaded_file($_FILES["profileImage"]['tmp_name'])) {
 

        // echo printf(rename($tempname, $folder));
        if (copy($tempname, $folder)) {
        // echo "<h3> Image uploaded successfully!</h3>";
    } 
    }
    // Now let's move the uploaded image into the folder: image
    // copy($tempname, $folder);
    // if (move_uploaded_file($tempname, $folder)) {
    //     echo "<h3> Image uploaded successfully!</h3>";
    // } else {
    //     echo "<h3>  Failed to upload image!</h3>";
    // }

        
?>