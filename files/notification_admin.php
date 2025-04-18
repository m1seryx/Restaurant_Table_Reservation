<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="../stylers/notification_admin.css">
    <title>Document</title>
</head>
<body>
   <!-- Navbar Section -->
   <nav>
    <ul class="sidebar">
       <li onclick="HideSidebar()">✖</li>
       <li><a href="../files/notification_admin.php">NOTIFICATION</a></li>
       <li><a href="../files/reservation_admin.php">MANAGE RESERVATION</a></li>
    </ul>

    <ul>
       <li class="logo"><a href="#">ARC PLATEAU</a></li>
       <li class="hideMobile"><a href="../files/notification_admin.php">NOTIFICATION</a></li>
       <li class="hideMobile"><a href="../files/reservation_admin.php">MANAGE RESERVATION</a></li>
       <li onclick="ShowSidebar()" class="menu-bar">
           <a href="#"><img src="../menu-sidebar.png" alt="Menu"></a>
       </li>
    </ul>
</nav>

<script>
    function ShowSidebar() {
        document.querySelector('.sidebar').style.display = 'flex';
    }
    function HideSidebar() {
        document.querySelector('.sidebar').style.display = 'none';
    }
</script>

<h1 class="welcome">Notifications</h1>

    <!-- Notification Page -->
    <div class="notification-container">
        <h2>Notifications</h2>
        <div class="notification-list">
            <!-- Notification 1 -->
            <div id="notification1" class="notification" onclick="markAsRead('notification1')">
                <div class="notification-text">
                    <p><strong>Sung Jin Woo</strong> Have Made a Reservation.</p>
                    <span>Just now</span>
                </div>
            </div>
           
            <!-- Notification 2 -->
            <div id="notification2" class="notification" onclick="markAsRead('notification2')">
                <div class="notification-text">
                    <p><strong>Paul Dagreat</strong> Have Made a Reservation.</p>
                    <span>10 minutes ago</span>
                </div>
            </div>

            <!-- Notification 3 -->
            <div id="notification3" class="notification" onclick="markAsRead('notification3')">
                <div class="notification-text">
                    <p><strong>Great Cheif Budu</strong> Have Made a Reservation.</p>
                    <span>30 minutes ago</span>
                </div>
            </div>

            <!-- Notification 4 -->
            <div id="notification4" class="notification" onclick="markAsRead('notification4')">
                <div class="notification-text">
                    <p><strong>Bisayang Eric</strong> Have Made a Reservation.</p>
                    <span>1 hour ago</span>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

