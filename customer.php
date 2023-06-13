<?php
    include("dbconnect.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Scno = $_POST["scno"];
        $CUSID = $_POST["cusid"];
        $Fullname = $_POST["fullname"];
        $Address = $_POST["address"];
        $MobileNo = $_POST["mobile"];
        $BranchID = $_POST["branch_id"];
        $DemandtypeId = $_POST["demandtypeid"];
        $DOB=$_POST["dob"];
        ?>
        <p>SCNO: <?php echo $Scno; ?><br>
<p>Customer ID: <?php echo $CUSID; ?><br>
<p>Full Name: <?php echo $Fullname; ?><br>
<p>Address: <?php echo $Address; ?><br>
<p>Mobile No.: <?php echo $MobileNo; ?><br>
<p>Branch ID: <?php echo $BranchID; ?><br>
<p>Demand Type ID: <?php echo $DemandtypeId; ?><br>
<?php

        $query = "INSERT INTO customer (scno, customerid, fullname, address, mobileno, branch_id, demand_type_id,dob) VALUES ('$Scno', '$CUSID', '$Fullname', '$Address', '$MobileNo', '$BranchID', '$DemandtypeId','$DOB')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Data Inserted Successfully";
        } else {
            echo "ERROR: " . $query . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>
