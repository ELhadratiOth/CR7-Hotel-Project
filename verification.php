<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$database = "database_client";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.html?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.html?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM data_client WHERE email = '$email' AND password='$password'";

		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result)  == 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] == $email && $row['password'] == $password) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['password'] = $row['password'];
            	$_SESSION['full_name'] = $row['full_name'];
            	header("Location:  signup.php");
		        exit();
            }else{
				header("Location: index.html?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.html?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.html");
	exit();
}

