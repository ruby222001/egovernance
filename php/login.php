<?php
session_start();

// Function to validate user credentials
function validateCredentials($username, $password, $userType) {
    // Perform your validation logic here, such as querying a database
    // and comparing the entered username, password, and user type
    // with the stored user data.
    // Return true if the credentials are valid, false otherwise.
    // Example:
    if ($userType === 'admin' && $username === 'admin' && $password === 'admin123') {
        return true;
    } elseif ($userType === 'customer' && $username === 'customer' && $password === 'customer123') {
        return true;
    }
    
    return false;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    
    if (validateCredentials($username, $password, $userType)) {
        // Valid credentials, start session and set session variables
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['userType'] = $userType;
        
        // Redirect to appropriate page based on user type
        if ($userType === 'admin') {
            header('Location: admin_dashboard.php');
        } elseif ($userType === 'customer') {
            header('Location: customer_profile.php');
        }
        exit();
    } else {
        // Invalid credentials
        $errorMessage = 'Invalid username or password.';
    }
}
?>