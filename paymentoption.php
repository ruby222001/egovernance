<?php
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
    $query = "INSERT into paymentoption(PID,BID,Pdate,PAmount,Payment_type_ID,Rebate_Amt,Fine_Amt) VALUES('$POID','$BID','$Pdate','$PAmount','$PaymentTypeID','$RebateAmt','$FineAmt');";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "Data Inserted Successfully";
    } else {
        echo "ERROR: " . $query . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);

    $args = http_build_query(array(
        'token' => 'CkbGd5B5JFSg6xnP2J4Rem', // Replace with the actual token
        'amount'  => 1000
    ));

    $url = "https://khalti.com/api/v2/payment/verify/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $headers = ['Authorization: Key test_secret_key_614eec0ede624202b701d4fc638ec86c'];
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Response
    $response = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($status_code == 200) {
        echo json_encode(['success' => 1]);
    } else {
        echo json_encode(['error' => 1, 'message' => 'Payment Failed']);
    }
}
?>
