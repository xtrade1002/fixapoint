let currentMonday = new Date('2025-04-07');

function getWeekDates(startDate) {
  const week = [];
  const monday = new Date(startDate);
  for (let i = 0; i < 7; i++) {
    const day = new Date(monday);
    day.setDate(monday.getDate() + i);
    week.push(day);
  }
  return week;
}

function formatDate(date) {
  return date.toLocaleDateString('hu-HU', {
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  });
}

function updateDateRangeText() {
  const monday = new Date(currentMonday);
  const sunday = new Date(monday);
  sunday.setDate(sunday.getDate() + 6);

  document.getElementById("dateRange").innerText =
    `${formatDate(monday)} – ${formatDate(sunday)}`;
}

function updateSlotDates() {
  const weekDates = getWeekDates(currentMonday);
  const tbody = document.querySelector("tbody");

  const hourStart = 8;
  const hourEnd = 21;
  const minutes = [":00", ":15", ":30", ":45"];

  let rowIndex = 0;
  for (let hour = hourStart; hour <= hourEnd; hour++) {
    for (let minute of minutes) {
      for (let dayIndex = 0; dayIndex < 7; dayIndex++) {
        const date = weekDates[dayIndex];
        const isoDate = date.toISOString().split("T")[0];
        const time = `${hour}${minute}`;
        const slot = `${isoDate} ${time}`;
        const cell = tbody.rows[rowIndex].cells[dayIndex + 1]; 
        cell.setAttribute("onclick", `openBookingModal('${slot}')`);
      }
      rowIndex++;
    }
  }
}

function loadPrevWeek() {
  currentMonday.setDate(currentMonday.getDate() - 7);
  updateDateRangeText();
  updateSlotDates();
}

function loadNextWeek() {
  currentMonday.setDate(currentMonday.getDate() + 7);
  updateDateRangeText();
  updateSlotDates();
}

function openBookingModal(slot) {
  document.getElementById("slotInput").value = slot;
  const modal = new bootstrap.Modal(document.getElementById("bookingModal"));
  modal.show();
}

document.addEventListener("DOMContentLoaded", () => {
  updateDateRangeText();
  updateSlotDates();
});



const sampleBookings = [
    {
      date: '2025-04-08', 
      start: '9:00',
      end: '11:00',
      label: '1D szempilla'
    }
  ];
  
  function markSampleBookings() {
    const tbody = document.querySelector("tbody");
  
    sampleBookings.forEach(booking => {
      const startHour = parseInt(booking.start.split(':')[0]);
      const startMinute = parseInt(booking.start.split(':')[1]);
      const endHour = parseInt(booking.end.split(':')[0]);
      const endMinute = parseInt(booking.end.split(':')[1]);
  
      const totalStartIndex = (startHour - 8) * 3 + (startMinute / 15);
      const totalEndIndex = (endHour - 8) * 3 + (endMinute / 15);
  
   
      const dateObj = new Date(booking.date);
      const dayIndex = (dateObj.getDay() + 6) % 7; 
  
      for (let rowIndex = totalStartIndex; rowIndex < totalEndIndex; rowIndex++) {
        const cell = tbody.rows[rowIndex]?.cells[dayIndex + 1];
        if (cell) {
          cell.classList.add('booked');
        }
      }
    });
  }

markSampleBookings();
