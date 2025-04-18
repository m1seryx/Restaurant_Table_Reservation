document.addEventListener("DOMContentLoaded", function () {
  fetchPendingReservations();
  retriveActive(); 
});

// Fetch pending reservations
function fetchPendingReservations() {
  fetch('../backendAdmin/get_pending_reservations.php')
    .then(response => {
      if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
      return response.json();
    })
    .then(data => displayReservations(data))
    .catch(error => {
      console.error('Error fetching reservations:', error);
      alert('There was an error fetching the reservations. Please check the console for details.');
    });
}

function displayReservations(reservations) {
  const tableBody = document.querySelector('#reservationTable tbody');
  tableBody.innerHTML = '';

  reservations.forEach(reservation => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${reservation.reservation_id}</td>
      <td>${reservation.user_name}</td>
      <td>Table ${reservation.table_number}</td>
      <td>${reservation.number_of_guests} guest(s)</td>
      <td>${reservation.reservation_date}</td>
      <td>${reservation.status}</td>
      <td>
        <button onclick="approveReservation(${reservation.reservation_id})" class="Accept">Accept</button>
        <button onclick="rejectReservation(${reservation.reservation_id})" class="Reject">Reject</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
}

// Fetch active reservations
function retriveActive() {
  fetch('../backendAdmin/retrieveActive.php')
    .then(response => {
      if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
      return response.json();
    })
    .then(data => displayRetrieveActive(data))
    .catch(error => {
      console.error('Error fetching active reservations:', error);
      alert('There was an error fetching active reservations.');
    });
}

function displayRetrieveActive(reservations) {
  const tableBody = document.querySelector('#ActiveReservation tbody');
  tableBody.innerHTML = '';

  reservations.forEach(reservation => {
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${reservation.reservation_id}</td>
      <td>${reservation.user_name}</td>
      <td>Table ${reservation.table_number}</td>
      <td>${reservation.number_of_guests} guest(s)</td>
      <td>${reservation.reservation_date}</td>
      <td>${reservation.status}</td>
      <td>
        <button onclick="Delete(${reservation.reservation_id})" class="Delete">Delete</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
}

// Approve/Reject
function approveReservation(reservationId) {
  updateReservationStatus(reservationId, 'Confirmed');
}

function rejectReservation(reservationId) {
  updateReservationStatus(reservationId, 'Cancelled');
}

function updateReservationStatus(reservationId, action) {
  const formData = new FormData();
  formData.append('reservation_id', reservationId);
  formData.append('action', action);

  fetch('../backendAdmin/approve_reject_reservation.php', {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        alert(data.error);
      } else {
        alert(data.success);
        fetchPendingReservations(); 
        retriveActive(); 
      }
    })
    .catch(error => {
      console.error('Error updating reservation status:', error);
    });
}
