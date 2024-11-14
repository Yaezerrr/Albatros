<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    
    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start the session and set session variables
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phoneNumber'] = $user['phoneNumber'];
            $_SESSION['streetAddress'] = $user['streetAddress'];
            $_SESSION['state'] = $user['state'];
            $_SESSION['country'] = $user['country'];
            $_SESSION['dateOfBirth'] = $user['dateOfBirth'];
            $_SESSION['paymentMethod'] = $user['paymentMethod'];
            $_SESSION['seatPreference'] = $user['seatPreference'];
            $_SESSION['mealPreference'] = $user['mealPreference'];
            $_SESSION['emergencyContactName'] = $user['emergencyContactName'];
            $_SESSION['emergencyContactPhone'] = $user['emergencyContactPhone'];

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p style='color: red;'>Invalid email or password. (Password mismatch)</p>";
        }
    } else {
        echo "<p style='color: red;'>Invalid email or password. (No user found)</p>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();