<?php
include '../database.php'; 

$registrationMessage = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

  
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email); 
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
     
        $registrationMessage = "Username or Email already taken.";
    } else {
      
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password); 

        if ($stmt->execute()) {
            $registrationMessage = "Registration Successful!";
        } else {
            $registrationMessage = "Something went wrong during registration.";
        }
    }

 
    $stmt->close();
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
        <h1>Please Register</h1>
      </div>
      <form action="" method="POST" id="registerForm">
        <div id="responseMessage" style="color: red; display: none;"></div>
        <label for="">Username</label> <br>
        <input type="text" size="20" required name="username"> 
        <br> <br>
        <label for="">Email</label> <br>
        <input type="email" size="20" required name="email"> 
        <br> <br>
        <label for="password">Password</label> <br> 
        <input type="password" size="20" required name="pass"> <br> <br>
        <input type="submit" value="Register" class="login" size="20" id="submit"> <br>
        <p>Already Have an Account? <a href="user.php"><strong>Login Here</strong></a></p>
      </form>
    </div>

    <!-- Popup Message -->
    <div class="back" id="back" style="display: none;">
      <div class="popUpMessage" id="pmessage" style="display: none;">
        <h1>REGISTRATION COMPLETE! <br> YOU CAN LOGIN NOW.</h1> <br>
        <a href="user.php">GO TO LOGIN!</a>
      </div>
    </div>
  </div>

<script>
  // Show response message
  const messageBox = document.getElementById('responseMessage');
  const registrationMessage = "<?php echo $registrationMessage; ?>";

  if (registrationMessage) {
    messageBox.textContent = registrationMessage;
    messageBox.style.display = 'block';
    messageBox.style.color = registrationMessage.includes("Successful") ? "green" : "red";

   
    if (registrationMessage.includes("Successful")) {
      setTimeout(() => {
        document.getElementById('back').style.display = 'flex';
        document.getElementById('pmessage').style.display = 'block';
      }, 1000);
    }
  }
</script>

</body>
</html>
