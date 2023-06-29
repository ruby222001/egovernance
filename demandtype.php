
<h2>The information you entered is: </h2>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $Demandtype = $_POST["demandtypeid"];
    $Description = $_POST["description"];
    $Status = $_POST["status"];
   
    echo "<p>Demandtype: $Demandtype<br>";
    echo "<p>Description: $Description<br>";
    echo "<p>Status: $Status<br>";



include("dbconnect.php");
$query = "INSERT into demandtype(demand_type_id,description,status) VALUES('$Demandtype','$Description','$Status');";
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






