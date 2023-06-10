<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($receiverEmail,$receiverName,$receiverSubject,$receiverBody, $receiverAltBody){
    $mail = new PHPMailer(true);
    try {
        //Enable verbose debug output
        $mail->isSMTP();   
        $mail->SMTPDebug = 2;
        $mail->SMTPSecure = 'ssl';  //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'westdynamics.tech@gmail.com';                     //SMTP username
        $mail->Password   = '';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;    
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )   
        );
        //Sent From
        // $mail->setFrom('westdynamics@gmail.com', 'West Dynamics');
        
        $mail->addAddress($receiverEmail, $receiverName);  //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
          //Optional name
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $receiverSubject;
        $mail->Body    = "<h4>$receiverBody</h4>
        <p>$receiverAltBody</p>
        <p>Warm regards<br>Velocity_VI Team</p>
        
        ";
        // $mail->addAttachment('../../assets/home.png', 'home.png');  
        $mail->send();
        return true;
    }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
// sendEmail('manaswemahlako@gmail.com','User Registered','Welcome To West Dynamics','Good Day User',"Hello world this is the west duynamics compaby in association with sincere trencs.");


function connectionToDatabase($databaseName){
    $dbServerName ='localhost';
    $dbUserName = 'root';
    $os = strval(php_uname());
    if (str_contains($os, 'Windows')) {
        $dbPassword = '';
    }
    elseif (str_contains($os, 'Linux')) {
        $dbPassword='root';
        // echo 'Linux';
    } 
    else {
        $dbPassword='';
    }
    $dbName = "$databaseName"; //Database Name
    // Establish database connection
    $conn = mysqli_connect($dbServerName, $dbUserName,$dbPassword);
    if (!$conn) {
        die("Unable to Connect database: " . mysqli_connect_error());
        echo "10";
        return false;
    }
    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    // Connect to database
    if (mysqli_query($conn,$sql)){
        $newCon = mysqli_connect($dbServerName, $dbUserName,$dbPassword,$dbName);
        return $newCon;
        }        
        else {
        echo "Error creating database: " . $conn->error;    
    }
    
}


function getUsersCollection($dataBaseConn,$collectionName){
    $newUsrSqlQ = "CREATE TABLE IF NOT EXISTS `$collectionName` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30),
        last_name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )"; 
    $createUsrCollection = mysqli_query($dataBaseConn,$newUsrSqlQ);
    return true;
}
function getProductsCollection($dataBaseConn,$collectionName){
    $newProdSqlQ = "CREATE TABLE IF NOT EXISTS `$collectionName`(
        id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        product_name VARCHAR(30),
        description VARCHAR(255),
        price VARCHAR(50)
    )"; 
    $createProductCollection = mysqli_query($dataBaseConn,$newProdSqlQ);
    return true;
}
function getCartCollection($dataBaseConn,$collectionName){
    $newProdSqlQ = "CREATE TABLE IF NOT EXISTS `$collectionName`(
        id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50),
        product_id VARCHAR(500)
    )"; 
    $createProductCollection = mysqli_query($dataBaseConn,$newProdSqlQ);
    return true;
}
function getPostsCollection($dataBaseConn,$collectionName){
    $newProdSqlQ = "CREATE TABLE IF NOT EXISTS `$collectionName`(
        id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        post_user VARCHAR(50),
        post_body VARCHAR(500)
    )"; 
    $createProductCollection = mysqli_query($dataBaseConn,$newProdSqlQ);
    return true;
}




getUsersCollection(connectionToDatabase('velocity_vi'),'users');
getProductsCollection(connectionToDatabase('velocity_vi'),'products');
getCartCollection(connectionToDatabase('velocity_vi'),'cart');
getPostsCollection(connectionToDatabase('velocity_vi'),'posts');

function insertProducts($dataBaseConn){
    $query = "INSERT INTO `products` (`id`, `product_name`, `description`, `price` ) VALUES
('132701','Front End', 'Transform mock-ups and wireframes into hard code with HTML5, CSS and Js per page', 800),
('132702','Front End', 'Transform mock-ups and wireframes into web applications with Js framework ReactJs', 1000),
('132703','Front End', 'Transform mock-ups and wireframes into web applications with Js framework React-Native', 1100),
('132704','Front End', 'Transform mock-ups and wireframes into web applications with Js framework Nodejs', 1200),
('132705','Front End', 'Transform mock-ups and wireframes into web applications with Js framework Angular', 1300),
('132706','Front End', 'Transform mock-ups and wireframes into web applications with Dart framework Flutter', 1200),
('132707','Front End', 'Transform mock-ups and wireframes into web applications with C# framework Dot Net MVC', 1500),
('132708','Backend', 'Application logic design system with client and server architecture  configuration, without code', 700),
('132709','Backend', 'Application logic design system with client and server architecture  configuration, with python code', 3000),
('132710','Backend', 'Application logic design system with client and server architecture  configuration, with python Flask code', 2700),
('132711','Backend', 'Application logic design system with client and server architecture  configuration, with python Django code', 2900),
('132712','Backend', 'Application logic design system with client and server architecture  configuration, with Js Node.js code', 3000),
('132713','Backend' , 'Application logic design system with client and server architecture  configuration, with C# Dot Net Console code', 3000),
('132714','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service PHP and MySQL', 5200),
('132715','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Node and MySQL', 5200),
('132716','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Node and PostgreSQL', 5300),
('132717','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Node and MongoDB', 5000),
('132718','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service React, Node and PostgreSQL', 5200),
('132719','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service React, Node and MySQL', 5100),
('132720','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service React, Node and MongoDB', 5300),
('132721','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Angular, Node and MySQL', 5300),
('132722','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Angular, Node and PostgreSQL', 5200),
('132723','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Angular, Node and MongoDB', 5100),
('132724','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Vue, Node and MySQL', 5100),
('132725','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Vue, Node and MongoDB', 5300),
('132726','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Vue, Node and PostgreSQL', 5200),
('132727','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Django and MySQL', 5100),
('132728','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Django and MongoDB', 5300),
('132729','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Django and PostgreSQL', 5200),
('132730','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Flask and MySQL', 5100),
('132731','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Flask and MongoDB', 5300),
('132732','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Js, Flask and PostgreSQL', 5200),
('132733','Full-Stack WebApp', 'without mock-up but with Front end, Backend and database service Dot Net and MySQL', 6200),
('132734','Hosting', 'Node Hosting', 1200),
('132735','Hosting', 'PHP Hosting', 1500),
('132736','Hosting', 'Flask Hosting', 1750),
('132737','Hosting', 'Dot Net Hosting', 1900),
('132738','Hosting', 'Django Hosting', 1600),
('132739','Hosting',  'Google Cloud Platform', 1200),
('132740','Hosting', 'Amazon Web  Services',  1300),
('132741','Hosting', 'Microsoft Azure',  1200),
('132742','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter,Dot Net and MySQL', 7100),
('132743','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter,Dot Net and PostgreSQL', 7300),
('132744','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter,Dot Net and MongoDB', 7300),
('132745','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter,Node and MySQL', 7100),
('132746','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter,Node and PostgreSQL', 7200),
('132747','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter,Node and MongoDB', 7300),
('132748','Full-Stack App', 'without mock-up but with Front end, Backend and database service Flutter and Firebase', 7500),
('132749','Full-Stack App', 'without mock-up but with Front end, Backend and database service React-Native and Firebase', 7400),
('132750','Full-Stack App', 'without mock-up but with Front end, Backend and database service React-Native and MongoDB', 7100),
('132751','Full-Stack App', 'without mock-up but with Front end, Backend and database service React-Native and MySQL', 7200),
('132752','Full-Stack App', 'without mock-up but with Front end, Backend and database service React-Native and PostgreSQL', 7300)";
$result = mysqli_query($dataBaseConn, $query);
}

// insertProducts(connectionToDatabase('velocity_vi'));

function getCollectionValues($dataBaseConn,$queryCollection,$firstEntry,$secondEntry,$thirdEntry,$fourthEntry){
    $query = "SELECT * FROM `$queryCollection`";
    // runs query to database
    $result = mysqli_query($dataBaseConn, $query);
    // $elements = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    // Check if the row arrays not empty 
    $byte = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // if more than one value in list
        $users = array($row[$firstEntry],$row[$secondEntry],$row[$thirdEntry],$row[$fourthEntry]);
        array_push($byte, $users);
    } 
    return $byte;

}
function getPosts($dataBaseConn,$queryCollection,$firstEntry,$secondEntry,$thirdEntry){
    $query = "SELECT * FROM `$queryCollection`";
    // runs query to database
    $result = mysqli_query($dataBaseConn, $query);
    // $elements = mysqli_fetch_assoc($result);
    $row = mysqli_num_rows($result);
    // Check if the row arrays not empty 
    $byte = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // if more tha one value in list
        $users = array($row[$firstEntry],$row[$secondEntry],$row[$thirdEntry]);
        array_push($byte, $users);
    } 
    
    return $byte;

}
// function inertIntoDatabase($dataBaseConn,$queryToBeSelected,$queryCollection){
//     $query = "SELECT `email` FROM `accounts` WHERE `` = '$username';";
    // runs query to database
    //     $result = mysqli_query($dataBaseConn, $query);
    //     $products = mysqli_fetch_assoc($result);
    //     return $products;
// }
function updateIntoDatabase($dataBaseConn,$queryToBeSelected,$queryCollection){
    $query = "UPDATE `$queryCollection` SET `password`= '$newPassword' WHERE `email` = '$currentEmail'; ";
    $result = mysqli_query($conn, $query);
//     $query = "SELECT `email` FROM `accounts` WHERE `username` = '$username';";
//     //     // runs query to database
//     //     $result = mysqli_query($dataBaseConn, $query);
//     //     $products = mysqli_fetch_assoc($result);
//     //     return $products;
}

function registerUser($dataBaseConn, $firstName,$lastName,$email,$passWord){
    $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) VALUES ('$firstName','$lastName','$email', '$passWord')";
    //  perform the query
    $result = mysqli_query($dataBaseConn, $query);
}
function addPost($dataBaseConn, $postUser,$postBody){
    $query = "INSERT INTO `posts` (`post_user`, `post_body`) VALUES ('$postUser', '$postBody')";
    //  perform the query
    $result = mysqli_query($dataBaseConn, $query);
}

function addNewToCart($dataBaseConn,$uEmail,$pId){
    $query = "INSERT INTO `cart`( `email`, `product_id`) VALUES ( '$uEmail', '$pId')";
        $res = mysqli_query($dataBaseConn, $query);


}
function addToCart($usrEmail,$prdId){
        $query = "SELECT * FROM `cart` WHERE `email` = '$usrEmail';";
        $res = mysqli_query(connectionToDatabase('velocity_vi'), $query);
        $row = mysqli_num_rows($res);
        if ($row == 0) {
        addNewToCart(connectionToDatabase('velocity_vi'),"$usrEmail",strval($prdId));
        echo json_encode(array(400),JSON_PRETTY_PRINT);
        return;
    }
    else{
        $ress = mysqli_fetch_assoc($res);
        $usrCartEmail = $ress['email'];
        $pid = strval($prdId);
        $query = "UPDATE `cart` SET `product_id` = concat(`product_id`,',','$pid' ) WHERE `email` = '$usrCartEmail';";
        $res = mysqli_query(connectionToDatabase('velocity_vi'), $query);
        echo json_encode(array(200),JSON_PRETTY_PRINT);
        return;
    }
    }

    function delFormCart($usrEmail,$prdId){
        $query = "SELECT * FROM `cart` WHERE `email` = '$usrEmail';";
        $res = mysqli_query(connectionToDatabase('velocity_vi'), $query);
        $row = mysqli_num_rows($res);
        if ($row == 0) {
        return;
    }
    else{
        $ress = mysqli_fetch_assoc($res);
        $usrCartEmail = $ress['email'];
        $pidStr = $ress['product_id'];
        // echo $pidStr;
        $pid = strval($prdId);
        $splitPidStr = explode(',',$pidStr);
        // echo print_r($splitPidStr);
        if (($key = array_search($prdId, $splitPidStr)) !== false) {
            array_splice($splitPidStr, $key, 1);
        }
        $wholeStr = implode(",",$splitPidStr);
        $query = "UPDATE `cart` SET `product_id` = '$wholeStr' WHERE `email` = '$usrCartEmail';";
        $res = mysqli_query(connectionToDatabase('velocity_vi'), $query);
        return json_encode(array(200),JSON_PRETTY_PRINT);
        // return;
    }
    }
    function delAllFormCart($usrEmail,$prdId){
        $query = "SELECT * FROM `cart` WHERE `email` = '$usrEmail';";
        $res = mysqli_query(connectionToDatabase('velocity_vi'), $query);
        $row = mysqli_num_rows($res);
        if ($row == 0) {
        return;
    }
    else{
        $ress = mysqli_fetch_assoc($res);
        $usrCartEmail = $ress['email'];
        $pidStr = $ress['product_id'];
        // echo $pidStr;
        $pid = strval($prdId);
        $splitPidStr = explode(',',$pidStr);
        // echo print_r($splitPidStr);
        for ($i=0; $i < count($splitPidStr); $i++) { 
            # code...
        if (($key = array_search($prdId, $splitPidStr)) !== false) {
                array_splice($splitPidStr, $key, 1);
        }}
        
        $wholeStr = implode(",",$splitPidStr);
        $query = "UPDATE `cart` SET `product_id` = '$wholeStr' WHERE `email` = '$usrCartEmail';";
        $res = mysqli_query(connectionToDatabase('velocity_vi'), $query);
        return json_encode(array(200),JSON_PRETTY_PRINT);
        // return;
    }
    }

 



function checkUserExist($allUsers,$reg_email){
    foreach ($allUsers as $value) {
        if (($value[2] == $reg_email)) {
            return TRUE;
            exit();
        }
    }
}


// checkUserExist(getCollectionValues(connectionToDatabase('velocity_vi'),'users','first_name','last_name','email','password'),'west@gmail.com');
function getUserCart($dataBaseConn, $usrs_Email){
    $query = "SELECT `product_id` FROM `cart` WHERE `email` = '$usrs_Email';";
    $res = mysqli_query($dataBaseConn, $query);
    $myCart = mysqli_fetch_assoc($res);
    // echo print_r($myCart);
    if (is_array($myCart)) {
        # code...
    
    $mainCart = explode(',',$myCart['product_id']);
    $myCart = array_count_values($mainCart);
    $getProd = '';
    
    // echo   print_r($myCart);
    foreach ($myCart as $key => $value) {
        $getProd = $getProd . ',' . intval($key);
    }
    $getProd = ltrim( $getProd , ',' );
    $new_query = "SELECT * FROM `products`;";
    $resA = mysqli_query($dataBaseConn, $new_query);
    $getProd = mysqli_num_rows($resA);
    $allUs = array();
    while ($row = mysqli_fetch_assoc($resA)) {
        // if more tha one value in list
        $allP = array($row['id'],$row['product_name'],$row['description'],$row['price']);
        array_push($allUs, $allP);
    }
    $cartValues = array();
    foreach($allUs as $cartV){ 
        if (in_array($cartV[0],$mainCart)) {
        $allCP = array($cartV[0],$cartV[1],$cartV[2],$cartV[3]);
        array_push($cartValues, array($allCP, $myCart[$cartV[0]]));
    }
}
    return $cartValues;
}
return  0;

}

function get_device()
{
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
function get_ip()
{

	//whether ip is from share internet
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip_address = $_SERVER['HTTP_CLIENT_IP'];
	}
	//whether ip is from proxy
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	//whether ip is from remote address
	else {
		$ip_address = $_SERVER['REMOTE_ADDR'];
	}
	return $ip_address;
}






?>