
<?php
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DRID = $_POST["drid"];
    $Demandtype = $_POST["demandtypeid"];
    $Rate = $_POST["rate"];
    $EffectiveDate = $_POST["effectivedate"];
    $IsCurrent = $_POST["iscurrent"];
    
    echo "<p>Demand Rate: $DRID<br>";
  echo "<p>Demand Type id: $Demand_type_id<br>";
  echo "<p>Rate: $rate<br>";
  echo "<p> Effective Date:$effective_date<br>; 
  echo "<p> IsCurrent:$isCurrent<br>;




include("dbconnect.php");
$query = "INSERT into Demand_Rate(DRID,demand_type_id,rate,effective_date,isCurrent) VALUES('$DRID','$Demandtype','$Rate','$EffectiveDate','$IsCurrent');";
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
