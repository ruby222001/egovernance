<h2>The information you entered is: </h2>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $POID = $_POST["pid"];
    $Name = $_POST["name"];
    $Status = $_POST["status"];
    
    echo "<p>payment_id: $POID<br>";
  echo "<p>Name: $Name<br>";
  echo "<p>Status: $Status<br>";

  include("dbconnect.php");
$query = "INSERT INTO payment (payment_id, name, status) VALUES('$POID','$Name','$Status');";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "payment added successfully";
  } else {
    echo "ERROR: " . $query . ":-" . mysqli_error($conn);  }

  mysqli_close($conn);
}
?>