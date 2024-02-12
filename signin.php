<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "database_client";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["full_name"];
    $phonenumber = $_POST["phone_number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = mysqli_real_escape_string($conn, $username);
    $phonenumber = mysqli_real_escape_string($conn, $phonenumber);

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "INSERT INTO data_client (full_name,phone_number,email, password) VALUES ('$username','$phonenumber','$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Form not submitted!";
}
$conn->close();


header("Location: registration.html");

?>