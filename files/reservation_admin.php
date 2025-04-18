<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../stylers/reservation_admin.css">
    <title>Document</title>
    <script>
function showTab(tabName) {
    document.getElementById('reservationTable').style.display = tabName === 'upcoming' ? 'table' : 'none';
    document.getElementById('ActiveReservation').style.display = tabName === 'past' ? 'table' : 'none';

    document.getElementById('upcoming-btn').classList.toggle('active', tabName === 'upcoming');
    document.getElementById('past-btn').classList.toggle('active', tabName === 'past');

    // 🆕 
    if (tabName === 'past') {
        retriveActive();
    }
    else if (tabName === 'upcoming') {
    retrivePending();  
}
}
</script>
</head>

<body>

    <!-- Navbar Section -->
    <nav>
        <ul>
           <li class="logo"><a href="#">ARC PLATEAU</a></li>
           <li class="hideMobile"><a href="../files/notification_admin.php">NOTIFICATION</a></li>
           <li class="hideMobile"><a href="..files/reservation_admin.php">MANAGE RESERVATION</a></li>
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
   

    <div class="overlay"></div>


    <h1 class="welcome">Welcome, Admin Paul</h1>


    <div class="container">
        <div class="tabs">
            <button id="upcoming-btn" class="tab active" onclick="showTab('upcoming')">Pending reservation</button>
            <button id="past-btn" class="tab" onclick="showTab('past')">Active reservation</button>
            <span class="month">MONTH OF APRIL</span>
        </div>

        <!-- Upcoming Reservations Table -->
        <table id="reservationTable">
             <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>User</th>
                    <th>Table</th>
                    <th>Guests Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                </tbody>
        </table>

        <table id="ActiveReservation">
             <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>User</th>
                    <th>Table</th>
                    <th>Guests Number</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
                <tbody>
                </tbody>
        </table>
    </div>
    <script src="../javascript/admin-booking.js"></script>
</body>
</html>


