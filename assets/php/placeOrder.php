<?php
/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   
*/

require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php';

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-bHlHddxNTHs9l_ZsIXPUovV5';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $_POST['total'],
    ),
    'item_details' => json_decode($_POST['products'], true),
    'customer_details' => array(
        'first_name' => $_POST['nama'],
        'email' => $_POST['email'],
        'phone' => $_POST['telp']
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;
?>

<script>
    alert 'aaa'
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    TES
</body>
</html>