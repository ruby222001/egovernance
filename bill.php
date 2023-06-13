<?php
include("dbconnect.php");


$BYear = $_POST["BYear"];

$BMonth = $_POST["BMonth"];
$BDate = $_POST["BDate"];
$CUSID = $_POST["CUSID"];
$Current = $_POST["Current_Reading"];
$Previous = $_POST["previous_Reading"];
$BAmount = $_POST["bill_amount"];
$BID = $_POST["BID"];

?>

<p>Bill Year: <?php echo $BYear; ?><br>
<p>Bill Month: <?php echo $BMonth; ?><br>
<p>Bill Date: <?php echo $BDate; ?><br>

<p>Customer ID: <?php echo $CUSID; ?><br>
<p>Current Reading: <?php echo $Current; ?><br>
<p>Previous Reading: <?php echo $Previous; ?><br>
<p>Bill Amount: <?php echo $BAmount; ?><br>
<p>Bill ID: <?php echo $BID; ?><br>

<?php
$query = "INSERT INTO bill (BYear, BMonth, BDate, CUSID, Current_Reading, Prev_Reading, Bamount,BID) VALUES ( '$BYear', '$BMonth', '$BDate', '$CUSID', '$Current', '$Previous', '$BAmount','$BID')";
$result = mysqli_query($conn, $query);
if($result)
{
    echo "Data Inserted Successfully";
}
else
{
    echo "ERROR: " . $query . ":-" . mysqli_error($conn);
}
mysqli_close($conn);
?>