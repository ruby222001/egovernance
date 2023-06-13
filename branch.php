<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $branch_id = $_POST['branch_id'];
  $name = $_POST['name'];
  $status = $_POST['status'];
  echo "<p>Branch_id: $branch_id<br>";
  echo "<p>Name: $name<br>";
  echo "<p>Status: $status<br>";

  include("dbconnect.php");

  $query = "INSERT INTO branch (branch_id, name, status) VALUES ('$branch_id', '$name', '$status')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Branch added successfully";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>