<?php
session_start();
include '../database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $password = trim(mysqli_real_escape_string($conn, $_POST['pass']));

  
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

      
        if (password_verify($password, $row['password'])) {
          
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];

          
            if ($row['email'] === "paul@gmail.com") {
                // Admin login
                header("Location: reservation_admin.php");
                exit();
            } else {
                // Regular user login
                header("Location: new_homepage.php");
                exit(); 
            }
        } else {
            // Incorrect password
            echo "<script>
            document.addEventListener('DOMContentLoaded', function () {
                const error = document.getElementById('error');
                error.innerText = 'Incorrect password. Please try again.';
                error.style.color = 'red';
            });
          </script>";
        }
    } else {
        // Email not found
        echo "<script>
        document.addEventListener('DOMContentLoaded', function () { 
            const error = document.getElementById('error');
            error.innerText = 'No user found with this email. Please check your email or register.';
            error.style.color = 'red';
        });
      </script>";
    }
}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Customer Login</title>
  <link rel="stylesheet" href="../stylers/user_admin.css">
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
        <p id="error" class="error"></p>
      </div>
      <form action="user.php" method="POST">
       
        <label for="">Email</label> <br>
        <input type="email" size="20" required name="email" id="email"> 
        <br> <br>
        <label for="password">Password</label> <br> 
        <input type="password" size="20" required name="pass" id="password"> <br> <br>
        <input type="submit" value="log in" class="login" size="20" id="submit"> <br>
          <p>Need an account? <a href="create_account.php"><Stong>Register here!</Stong></a></p>
          <p><a ><strong>WELCOME!</strong></a></p>
      </form>
    </div>
  </div>
</body>
</html>