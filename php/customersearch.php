<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your meta tags, title, and CSS links here -->
</head>
<body>
    <!-- Add your HTML content here -->

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the search parameters
        $customerID = $_POST['customerID'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $mobileNumber = $_POST['mobileNumber'];

        // Include the database connection
        include("dbconnect.php");

        // Prepare the SQL query
        $query = "SELECT * FROM customer WHERE customerid = '$customerID' AND dob = '$dateOfBirth' AND mobileno = '$mobileNumber'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Customer Details:</h3>";

            while ($row = mysqli_fetch_assoc($result)) {
                $SCNO = $row['scno'];
                $Customer_id = $row['customerid'];
                $fullname = $row['fullname'];
                $address = $row['address'];
                $mobile = $row['mobileno'];
                $branch_id = $row['branch_id'];
                $demand_type_id = $row['demand_type_id'];

                echo "<table border='1px'>
                    <tr>
                        <td>SCNO</td>
                        <td>$SCNO</td>
                    </tr>
                    <tr>
                        <td>Customer ID</td>
                        <td>$Customer_id</td>
                    </tr>
                    <tr>
                        <td>Full Name</td>
                        <td>$fullname</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>$address</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>$mobile</td>
                    </tr>
                    <tr>
                        <td>Branch ID</td>
                        <td>$branch_id</td>
                    </tr>
                    <tr>
                        <td>Demand Type ID</td>
                        <td>$demand_type_id</td>
                    </tr>
                </table>";
            }
        } else {
            echo "No results found.";
        }

        mysqli_close($conn);
    }
    ?>
</body>
</html>
