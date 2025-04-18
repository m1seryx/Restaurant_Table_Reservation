<?php
 $db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "table_reservation";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['pass']));

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['pass']) {
          header("Location: new_homepage.php"); 
          exit();
      } else {
          echo "<script>alert('Incorrect password. Please try again.');</script>";
      }
  } else {
      echo "<script>alert('Email not found. Please register.');</script>";
  }
}

mysqli_close($conn);
?>










<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>ADMIN</title>
  <link rel="stylesheet" href="../stylers/user_admin.css">
</head>
<body>
  <div class="container">
    <div class="arc">
      <h1>WELCOME, ADMIN</h1> <br>
      <div class="words">
      <p>Welcome to the ARC Plateau Restaurant Admin Panel. This dedicated space allows you to efficiently manage restaurant operations, ensuring everything runs smoothly for our valued guests.</p>
      <p>From handling reservations and updating table availability to managing customer feedback and monitoring order statuses, this panel provides the tools you need to keep things organized and seamless.</p>
      </div>
    </div>

    <div class="form">
      <div>
        <img src="../image/image-removebg-preview.png" alt="">
        <h1>Please Login</h1>
      </div>
      <form action="user.php" method="POST">
       
        <label for="">Email</label> <br>
        <input type="email" size="20" required name="email"> 
        <br> <br>
        <label for="password">Password</label> <br> 
        <input type="password" size="20" required name="pass"> <br> <br>
        <input type="submit" value="log in" class="login" size="20"> <br>
          <p>**********</p>
          <p><a href="user.php"><strong>USER/CUSTOMER</strong></a></p>
        
      </form>
    </div>
  </div>
</body>
</html>