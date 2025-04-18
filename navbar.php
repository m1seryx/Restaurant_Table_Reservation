<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="../nav.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="sidebar">
           <li onclick=HideSidebar() ></a></li>
           <li ><a href="#Menu">MENUS</a></li>
           <li ><a href="#booknow">RESERVATION</a></li>
           <li ><a href="#feedback">FEEDBACK</a></li>
           <li ><a href="#aboutus">ABOUT US</a></li>
           <li ><a href="../files/reservation_user.php">RESERVATION MADE</a></li>
           <li  onclick="logout()"><a href="#LOGO" class="logouts" onclick="logout()">LOGOUT</a></li>
          
        </ul>

        <ul>
        
           <li class="logo" ><a href="">ARC PLATEAU</a> <input type="image" src="../icons/logout-icon.png" width="45" height="40" onclick="logout()" id="bar"></li>
           <li class="hideMobile"><a href="#home">HOME</a></li>
           <li class="hideMobile"><a href="#Menu">MENUS</a></li>
           <li class="hideMobile"><a href="#booknow">RESERVATION</a></li>
           <li class="hideMobile"><a href="#aboutus">ABOUT US</a></li>
           <li class="hideMobile"><a href="#feedback">FEEDBACK</a></li>
           <li ><a href="../files/reservation_user.php">RESERVATION MADE</a></li>
           
           <li  onclick=ShowSidebar() class="menu-bar" id="menu-bar"><a href="#"><img src="../menu-sidebar.png" alt=""></a></li>
        </ul>
        
</nav>



<div class="logout-div" id="logoutForm">
    <div class="logout">
        <div class="letter">
        <h1>Are you sure you want to log out?</h1>
        <p>You need to login again to access your account</p>
        </div>
        <div class="confirm">
            <div class="LOGOUT"><button><a href="../files/user.php">YES</a></button></div>
            <div class="cancel"><button><a href="" id="cancel" onclick="cancel()">CANCEL</a></button></div>
        </div>
    </div>
</div>
<script src="../javascript/nav.js"></script>
       


    
</body>
</html>