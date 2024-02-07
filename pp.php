<?php
// Assuming you have a MySQL database named "your_database" with a table named "users"
$servername = "localhost";
$username = "root";
$password = "";
$database = "database";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecting data from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate and sanitize the input (for security)
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Hash the password for security (use a stronger hashing algorithm in production)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the "users" table
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect or handle the case where the form wasn't submitted
    echo "Form not submitted!";
}

// Close the database connection
$conn->close();
?>
