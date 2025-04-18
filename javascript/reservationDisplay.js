document.addEventListener("DOMContentLoaded", function () {
    function loadReservation() {
        fetch(`../backendUser/reservationUser.php`, {
            credentials: 'include'
        })
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    document.getElementById('reservation_table').innerHTML = data.error;
                } else {
                    let tableHTML = `
                    <table>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Table Number</th>
                            <th>Guest Count</th>
                            <th>Reservation Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                `;
                
                data.reservations.forEach(reservation => {
                    tableHTML += `
                        <tr>
                            <td>${reservation.reservation_id}</td>
                            <td>${reservation.table_number}</td>
                            <td>${reservation.number_of_guests}</td>
                            <td>${reservation.reservation_date}</td>
                            <td>${reservation.status}</td>
                            <td><button onclick="deleteReservation(${reservation.reservation_id}, '${reservation.reservation_date}')">Cancel</button></td>
                            
                        </tr>
                    `;
                });
                
                tableHTML += `</table>
                <span>*notice* Reservation can be cancelled only within 5 hours. Failure to show up will be ban forever in the restaurant</span>`;
                document.getElementById('reservation_table').innerHTML = tableHTML;
                }
            })
            .catch(() => {
                document.getElementById('reservation_table').innerHTML = "No reservation made.";
            });
    }

    loadReservation();
    setInterval(loadReservation, 3000);
});

// Function to check if the cancellation is allowed within 5 hours
function isCancellationAllowed(reservationTime) {
    const currentTime = Date.now(); 
    const reservationTimeMillis = new Date(reservationTime).getTime();
    const timeElapsed = currentTime - reservationTimeMillis; 

  
    const maxCancelTime = 5 * 60 * 60 * 1000;

    return timeElapsed <= maxCancelTime; 
}

// Function to delete a reservation with time check
function deleteReservation(reservation_id, reservation_time) {
   
    if (isCancellationAllowed(reservation_time)) {
    
        fetch(`../backendUser/reservationUser.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `delete_reservation_id=${reservation_id}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.success);
                loadReservation(); 
            } else {
                alert(data.error);
            }
        })
        .catch(error => console.error('Error deleting reservation:', error));
    } else {
       
        alert("You can no longer cancel your reservation. 5 hours have passed.");
    }
}
