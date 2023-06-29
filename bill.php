<?php
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $BYear = $_POST["BYear"];
    $BMonth = $_POST["BMonth"];
    $BDate = $_POST["BDate"];
    $CUSID = $_POST["CUSID"];
    $Current = $_POST["Current_Reading"];
    $Previous = $_POST["previous_Reading"];
    $BAmount = $_POST["bill_amount"];
    $BID = $_POST["BID"];

    $query = "INSERT INTO bill (BYear, BMonth, BDate, CUSID, Current_Reading, Prev_Reading, Bamount, BID) VALUES ('$BYear', '$BMonth', '$BDate', '$CUSID', '$Current', '$Previous', '$BAmount', '$BID')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data Inserted Successfully";
    } else {
        echo "ERROR: " . $query . ":-" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
