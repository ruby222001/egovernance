<?php
require_once 'vendor/autoload.php';
use Khalti\Checkout\Utils\Config;
use Khalti\Checkout\Utils\TokenGenerator;
use Khalti\Checkout\Api\Client as KhaltiClient;

$publicKey = 'test_public_key_f66150ba2f6c4fc7badd7a1ce544983d';
$secretKey = 'test_secret_key_614eec0ede624202b701d4fc638ec86c';
$token = TokenGenerator::generateUniqueToken();

$config = new Config($publicKey, $secretKey, Config::$BASE_URL_PRODUCTION);
$khalti = new KhaltiClient($config);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $POID = $_POST["pid"];
    $BID = $_POST["bid"];
    $Pdate = $_POST["pdate"];
    $PAmount = $_POST["pamount"];
    $PaymentTypeID = $_POST["paymenttypeid"];
    $RebateAmt = $_POST["rebate"];
    $FineAmt = $_POST["fine"];
    
    echo "<p>Payment ID: " . $POID . "<br>";
    echo "<p>Bill ID: " . $BID . "<br>";
    echo "<p>Payment Date: " . $Pdate . "<br>";
    echo "<p>Payment Amount: " . $PAmount . "<br>";
    echo "<p>Payment Type ID: " . $PaymentTypeID . "<br>";
    echo "<p>Rebate Amount: " . $RebateAmt . "<br>";
    echo "<p>Fine Amount: " . $FineAmt . "<br>";

    include("dbconnect.php");
    $query = "INSERT into paymentoption(POID,BID,Pdate,PAmount,Payment_type_ID,Rebate_Amt,Fine_Amt) VALUES('$POID','$BID','$Pdate','$PAmount','$PaymentTypeID','$RebateAmt','$FineAmt');";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Data Inserted Successfully";
    } else {
        echo "ERROR: " . $query . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
