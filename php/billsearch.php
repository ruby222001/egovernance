<?php
$conn = mysqli_connect("127.0.0.1:3307", "username", "password", "egov");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['BID'])) {
    $BID = $_POST['BID'];
    echo $BID . "<br>";

    $query = "SELECT BID, BDate, BYear, CUSID, current_reading, prev_reading, bamount FROM bill WHERE BID = $BID";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<h1>BILL details</h1>";
        while ($row = mysqli_fetch_assoc($result)) {
            $BID = $row['BID'];
            $BDate = $row['BDate'];
            $Byear = isset($row['Byear']) ? $row['Byear'] : "";
            $Customer_id = isset($row['CUSID']) ? $row['CUSID'] : "";
            $current_reading = $row['current_reading'];
            $prev_reading = $row['prev_reading'];
            $bamount = $row['bamount'];

            echo "<table border='1px'>
                <tr>
                    <td>Bid</td>
                    <td>$BID</td>
                </tr>
                <tr>
                    <td>bill date</td>
                    <td>$BDate</td>
                </tr>
                <tr>
                    <td>bill year</td>
                    <td>$Byear</td>
                </tr>
                <tr>
                    <td>customer id</td>
                    <td>$Customer_id</td>
                </tr>
                <tr>
                    <td>current reading</td>
                    <td>$current_reading</td>
                </tr>
                <tr>
                    <td>previous reading</td>
                    <td>$prev_reading</td>
                </tr>
                <tr>
                    <td>bill amount</td>
                    <td>$bamount</td>
                </tr>
            </table>";
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Bill ID not provided.";
}

mysqli_close($conn);
?>
