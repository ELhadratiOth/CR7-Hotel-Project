<?php 
session_start();

if (isset($_SESSION['password']) && isset($_SESSION['email'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="icon" type="image/png" href="login.png">
    <link rel="stylesheet" href="signup.css">



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barriecito&family=Crimson+Text:wght@700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Arsenal:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>


<div class="con1">
<img class="imgcon1" src="logopast.png" alt="">
</div>
<div class="con2">
    <span class="wel1">
Welcome back &nbsp; <span class="message"> <?php echo $_SESSION['full_name']  ; ?>  ! </span></span>
<p class="wel2">
Happy to see you again!
</p>
<input class="button" type="button" value="Go to Homepage" onclick="window.location.href=' after_signup.html'"> 

</div>

</body>
</html>
<?php 
}else{
     header("Location: index.html");
     exit();
}
 ?>