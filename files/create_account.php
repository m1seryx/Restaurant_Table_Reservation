<?php
$conn = new mysqli("localhost", "root", "", "table_reservation");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT); 

  
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
              document.getElementById('back').style.display = 'flex';
              document.getElementById('pmessage').style.display = 'block';
            });
          </script>";
}

}

$conn->close();
?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <title>Customer Login</title>
  <link rel="stylesheet" href="../stylers/create.css">
</head>
<body>
  <div class="container">
    <div class="arc">
      <h1>WELCOME TO ARC PLATEAU RESTAURANT</h1> <br>
      <div class="words">
      <p>At ARC Plateau Restaurant, we take pride in serving delicious food that satisfies every craving. Whether you're here for a casual meal, a family gathering, or a special celebration, we’re dedicated to making your experience enjoyable and memorable.</p>
      <p>Our menu offers a variety of flavorful dishes that cater to different tastes, ensuring there's something for everyone. With a welcoming atmosphere and attentive staff, we strive to provide comfort and convenience for all our guests</p>
      </div>
    </div>

    <div class="form">
      <div>
        <img src="../image/image-removebg-preview.png" alt="">
        <h1>Please Login</h1>
      </div>
      <form action="create_account.php" method="POST">
        <label for="">Username</label> <br>
        <input type="text" size="20" required name="username"> 
        <br> <br>
        <label for="">Email</label> <br>
        <input type="email" size="20" required name="email"> 
        <br> <br>
        <label for="password">Password</label> <br> 
        <input type="password" size="20" required name="pass"> <br> <br>
        <input type="submit" value="Register" class="login" size="20"   id="submit"> <br>
          <p>Already Have an Account? <a href="user.php"><Stong>Login Here</Stong></a></p>
      </form>
    </div>
  
    <div class="back" id="back">
      <div class="popUpMessage" id="pmessage">
        <h1>REGISTRATION COMPLETE! <br> YOU CAN LOGIN NOW.</h1> <br>
        <a href="user.php">GO TO LOGIN!</a>
      </div>
    </div>
  </div>




</body>
</html>
