<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



//Create an instance; passing `true` enables exceptions


 function sendMail($reciever){
    $mail = new PHPMailer(true);
    try {
                         //Enable verbose debug output
    $mail->isSMTP();   
    $mail->SMTPDebug = 2;
    $mail->SMTPSecure = 'ssl';  //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lekgaujonas@gmail.com';                     //SMTP username
    $mail->Password   = 'nlischnbiuarknba';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;    
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )   
    ); //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
    //Recipients
    $mail->setFrom('lekgaujonas@gmail.com', 'Mailer');
    $length = count($reciever);
    for ($i=0; $i < $length; $i++) { 
        
    $mail->addAddress($receiver[i], 'West');  //Add a recipient
    }

    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    echo "2";
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcome To Reversed';
    $mail->Body    = '<p>Good Day</p>';
    $mail->AltBody = 'Face it i am Inevitable';

    $mail->send();
    return true;
}
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    return false;
}

}

$emails = array('Jonaslekgau@gmail.com', 'Jonaslekgau@gmail.com');
if (sendMail(...$emails) == 1) {
    # code...
    echo "email failed";
}else{
    echo "Email Not Sent";
}

?>



 