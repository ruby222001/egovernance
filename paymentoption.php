
<?php
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $POID = $_POST["pid"];
    $BID = $_POST["bid"];
    $Pdate = $_POST["pdate"];
    $PAmount = $_POST["pamount"];
    $PaymentTypeID = $_POST["paymenttypeid"];
    $RebateAmt = $_POST["rebate"];
    $FineAmt = $_POST["fine"];
    

    echo "<p>Payment ID: " . $PID . "<br>";
    echo "<p>Bill ID: " . $BID . "<br>";
    echo "<p>Payment Date: " . $Pdate . "<br>";
    echo "<p>Payment Amount: " . $PAmount . "<br>";
    echo "<p>Payment Type ID: " . $PaymentTypeID . "<br>";
    echo "<p>Rebate Amount: " . $RebateAmt . "<br>";
    echo "<p>Fine Amount: " . $FineAmt . "<br>";


include("dbconnect.php");
      $query = "INSERT into paymentoption(POID,BID,Pdate,PAmount,Payment_type_ID,Rebate_Amt,Fine_Amt) VALUES('$PID','$BID','$Pdate','$PAmount','$PaymentTypeID','$RebateAmt','$FineAmt');";
   $result = mysqli_query($conn,$query);
if($result)
{
    echo "Data Inserted Succesfully";
}
else
{
    echo "ERROR: ".$query.":-".mysqli_error($conn);
}
mysqli_close($conn);
    }
?>
