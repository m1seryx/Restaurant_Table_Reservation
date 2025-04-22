document.addEventListener('DOMContentLoaded', function () {
    const bookingForm = document.getElementById('bookingForm');
    const availableTablesDiv = document.getElementById('availableTables');
    const numSeatsSelect = document.getElementById('numSeats');
    const resDateInput = document.querySelector('input[name="res_date"]');
  
    const reservationModal = document.getElementById('reservationModal');
    const modalTableInfo = document.getElementById('modalTableInfo');
    const confirmBtn = document.getElementById('confirmReservationBtn');
    const closeBtn = document.querySelector('.close-btn');
  
    let selectedTable = null;
  
    bookingForm.addEventListener('submit', function (e) {
      e.preventDefault();
  
      const numSeats = numSeatsSelect.value;
      const resDate = resDateInput.value;
  
      if (!numSeats || !resDate) {
        alert('Please select number of seats and a reservation date.');
        return;
      }
  
      fetchAvailableTables(numSeats, resDate);
    });
  
    function fetchAvailableTables(numSeats, resDate) {
      const url = `../backendUser/get_available_tables.php?numSeats=${numSeats}&resDate=${resDate}`;
  
      fetch(url)
        .then(response => response.json())
        .then(data => {
          displayAvailableTables(data);
        })
        .catch(error => {
          alert('Error fetching available tables');
        });
    }
  
    function displayAvailableTables(tables) {
      availableTablesDiv.classList.remove('hidden');
      availableTablesDiv.innerHTML = '';
  
      if (tables.error) {
        availableTablesDiv.innerHTML = `<p>${tables.error}</p>`;
        return;
      }
  
      if (tables.length === 0) {
        availableTablesDiv.innerHTML = '<p>No tables available for the selected criteria.</p>';
        return;
      }
  
      tables.forEach(table => {
        const tableDiv = document.createElement('div');
        tableDiv.classList.add('table');
        tableDiv.setAttribute('data-table-id', table.table_id);
        tableDiv.textContent = `Table ${table.table_number}  Seats: ${table.capacity}`;
  
        tableDiv.addEventListener('click', function () {
          selectedTable = table;
          modalTableInfo.textContent = `Table ${table.table_number}`;
          reservationModal.classList.remove('hidden');
        });
  
        availableTablesDiv.appendChild(tableDiv);
      });
    }
  
    confirmBtn.addEventListener('click', function () {
      const email = document.getElementById('email').value;
      const name = document.getElementById('name').value;
      const resDate = resDateInput.value;
      const numSeats = numSeatsSelect.value;
  
      if (!email || !name || !resDate || !numSeats || !selectedTable) {
        alert('Please complete the reservation form.');
        return;
      }
  
      const reservationData = new FormData();
      reservationData.append('email', email);
      reservationData.append('name', name);
      reservationData.append('table_id', selectedTable.table_id);
      reservationData.append('res_date', resDate);
      reservationData.append('numSeats', numSeats);
  
      fetch('../backendUser/reserve_table.php', {
        method: 'POST',
        body: reservationData
      })
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            alert(data.error);
          } else {
            alert(data.success);
            availableTablesDiv.classList.add('hidden');
            bookingForm.reset();
            reservationModal.classList.add('hidden');
          }
        })
        .catch(error => {
          alert('Error making reservation');
        });
    });
  
    closeBtn.addEventListener('click', function () {
      reservationModal.classList.add('hidden');
    });
  });
  