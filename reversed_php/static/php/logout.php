
<?php
include('../../auth.php');

if($_SESSION['username']) {
    $_SESSION['loggedin'] = FALSE;
    session_destroy();
    header('Location: ../../index.html');
    // session_destroy();
    
}
?>