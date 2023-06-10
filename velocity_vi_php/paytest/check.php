<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /**
 * @param array $data
 * @param null $passPhrase
 * @return string
 */

function generateSignature($data, $passPhrase = null) {
    // Create parameter string
    $pfOutput = '';
    foreach( $data as $key => $val ) {
        if($val !== '') {
            $pfOutput .= $key .'='. urlencode( trim( $val ) ) .'&';
        }
    }
    // Remove last ampersand
    $getString = substr( $pfOutput, 0, -1 );
    if( $passPhrase !== null ) {
        $getString .= '&passphrase='. urlencode( trim( $passPhrase ) );
    }
    return md5( $getString );


// Construct variables
$cartTotal = 10.00; // This amount needs to be sourced from your application
$passphrase = 'kingjangwei';
$data = array(
    // Merchant details
    'merchant_id' => '10000100',
    'merchant_key' => '46f0cd694581a',
    'return_url' => 'http://www.yourdomain.co.za/return.php',
    'cancel_url' => 'http://www.yourdomain.co.za/cancel.php',
    'notify_url' => 'http://www.yourdomain.co.za/notify.php',
    // Buyer details
    'name_first' => 'First Name',
    'name_last'  => 'Last Name',
    'email_address'=> 'test@test.com',
    // Transaction details
    'm_payment_id' => '1234', //Unique payment ID to pass through to notify_url
    'amount' => number_format( sprintf( '%.2f', $cartTotal ), 2, '.', '' ),
    'item_name' => 'Order#123'
);



$signature = generateSignature($data, $passphrase);
$data['signature'] = $signature;

// If in testing mode make use of either sandbox.payfast.co.za or www.payfast.co.za
$testingMode = true;
$pfHost = $testingMode ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
$htmlForm = '<form action="https://'.$pfHost.'/eng/process" method="post">';
foreach($data as $name=> $value)
{
    $htmlForm .= '<input name="'.$name.'" type="hidden" value=\''.$value.'\' />';
}
$htmlForm .= '<input type="submit" value="Pay Now" /></form>';

echo $htmlForm;
} ?>
    <form action="https://sandbox.payfast.co.za/eng/process" method="post">
        <input type="hidden" name="merchant_id" value="10029243">
    <input type="hidden" name="merchant_key" value="aq8n8huwn8x20">
    <input type="hidden" name="return_url" value="https://https://velocityvi.000webhostapp.com/views/success">
    <input type="hidden" name="cancel_url" value="https://https://velocityvi.000webhostapp.com/views/cancel">
    <input type="hidden" name="notify_url" value="https://https://velocityvi.000webhostapp.com/views/notify">
        <input type="hidden" name="email_confirmation" value="1">
    <input type="hidden" name="confirmation_address" class="confirmation_email_address">
    <input type="hidden" name="amount" value="100.00">
    <input type="hidden" name="item_name" value="Test Product">
    <input type="submit">
</form>
</body>
</html>