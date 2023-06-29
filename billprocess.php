<?php
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $BYear = $_POST["BYear"];
  $BMonth = $_POST["BMonth"];
  $BDate = $_POST["BDate"];
  $CUSID = $_POST["CUSID"];
  $Current = $_POST["Current_Reading"];
  $Previous = $_POST["previous_Reading"];
  $BAmount = $_POST["bill_amount"];
  $BID = $_POST["BID"];

  echo "<p>Bill Year: " . $BYear . "<br>";
  echo "<p>Bill Month: " . $BMonth . "<br>";
  echo "<p>Bill Date: " . $BDate . "<br>";
  echo "<p>Customer ID: " . $CUSID . "<br>";
  echo "<p>Current Reading: " . $Current . "<br>";
  echo "<p>Previous Reading: " . $Previous . "<br>";
  echo "<p>Bill Amount: " . $BAmount . "<br>";
  echo "<p>Bill ID: " . $BID . "<br>";

  $query = "INSERT INTO Bill (BYear, BMonth, BDate, CUSID, Current, Previous, BAmount, BID) VALUES ('$BYear', '$BMonth', '$BDate', '$CUSID', '$Current', '$Previous', '$BAmount', '$BID')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Data Inserted Successfully";
  } else {
    echo "ERROR: " . $query . ":-" . mysqli_error($conn);
  }
  mysqli_close($conn);
}
?>

