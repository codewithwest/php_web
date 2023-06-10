<?php
session_start();
include('functions.php');

if(isset($_SESSION['loggedin'])){
    $cart = getUserCart(connectionToDatabase('velocity_vi'),  $_SESSION['email'] );
    $allPosts = getPosts(connectionToDatabase('velocity_vi'),'posts','id','post_user', 'post_body');

}
$productsList = getCollectionValues(connectionToDatabase('velocity_vi'),'products','id','product_name', 'description','price');
$allPosts = getPosts(connectionToDatabase('velocity_vi'),'posts','id','post_user', 'post_body');
    
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: ../');
}
else if(isset($_POST['sign_up_first_name'])) {
    $newUsers = getCollectionValues(connectionToDatabase('velocity_vi'),'users','first_name','last_name','email','password');
    if (checkUserExist($newUsers,$_POST['sign_up_email'] ) === TRUE) {
        $jsonUsers = json_encode(array(400),JSON_PRETTY_PRINT);
        echo $jsonUsers;
    } else {
        $usrPass = $_POST['sign_up_pass_confirm'];
        registerUser(connectionToDatabase('velocity_vi'),$_POST['sign_up_first_name'],$_POST['sign_up_last_name'],$_POST['sign_up_email'],$usrPass);
        sendEmail($_POST['sign_up_email'],$_POST['sign_up_email'],'Welcome To Velocity_VI',"Greetings ". $_POST['sign_up_first_name'],"Welcome to velocity_VI, we are delighted to have you as part of our family.<br>Hop on and enjoy what we have in store for you,<br>if you have any concerns do visit the FAQ page or reach out to us on your favorite platform.<br>");
        echo json_encode($newUsers,JSON_PRETTY_PRINT);
    }
}
else if(isset($_POST['sign_in_email'])){
    $newUsers = getCollectionValues(connectionToDatabase('velocity_vi'),'users','first_name','last_name','email','password');
    function LogIN($nwUsers,$logEmail,$logPass){
        foreach ($nwUsers as $value) {
            if ((($value[2] == $logEmail) && ($value[3] == $logPass)) === TRUE) {
                return true;
            } 
        }
    }
    if(LogIN($newUsers,$_POST['sign_in_email'],$_POST['sign_in_pass']) === true){
        $_SESSION['loggedin'] = $_POST['sign_in_email'];
        $_SESSION['email'] = $_POST['sign_in_email'];
        $_SESSION['cart'] = getUserCart(connectionToDatabase('velocity_vi'),  $_SESSION['email']);
        echo '<div class="not_logged_in">
        <div class="logged_in mh-100  container-fluid bg-success text-center">
        <h4>Welcome to Velocity VI</h4>
        </div>
        </div>';
    }else{
        session_destroy();
        echo '<div class="not_logged_in">
        <div class="not_logged_in  container-fluid bg-danger text-center">
        <h5>Error Logging In!<br> Incorrect Email or Password</h5>
        </div>
        </div>';
    }
        // $logged = $_SESSION['loggedin'] = FALSE;
        // $jsonSignInUsers = json_encode(array($logged),JSON_PRETTY_PRINT);
}
else if(isset($_POST['product_id'])){
    addToCart($_POST['user_email'],$_POST['product_id']);
    }
    else if (isset($_POST['product_id_dec'])) {
        delFormCart($_POST['user_email'],$_POST['product_id_dec']);
}

else if (isset($_POST['product_id_rmv'])) {
        delAllFormCart($_POST['user_email'],$_POST['product_id_rmv']);
        
}
else if (isset($_POST['blog_user'])) {
        addPost(connectionToDatabase('velocity_vi'), $_POST['blog_user'],$_POST['blog_body']);
    
}

?>