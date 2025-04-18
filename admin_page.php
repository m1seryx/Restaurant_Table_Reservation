<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>
<nav>
        <ul>
           <li class="logo" ><a href="">ARC PLATEAU</a></li>
           <li class="hideMobile"><a href="#home">PENDING</a></li>
           <li class="hideMobile"><a href="#Menu">RESERVATION</a></li>
        </ul> 
</nav>


    <h1>PENDING RESERVATIONS</h1>

    <table id="reservationTable">
        <thead>
            <tr>
                <th>Reservation ID</th>
                <th>User</th>
                <th>Table</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<script src="javascript/admin-booking.js"></script>
</body>
</html>
