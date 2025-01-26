const monthYearElement = document.getElementById('monthYear');
const datesElement = document.getElementById('dates');
const prev = document.getElementById('prev');
const next = document.getElementById('next');

let currentDate = new Date();

const updateCalendar = () => {
const currentYear = currentDate.getFullYear();
const currentMonth = currentDate.getMonth();
const firstDay = new Date(currentYear, currentMonth, 1);
const lastDay = new Date(currentYear, currentMonth + 1, 0);
const totalDays = lastDay.getDate();
const firstDayIndex = (firstDay.getDay() + 6) % 7;
const lastDayIndex = lastDay.getDay();
monthYearElement.textContent = currentDate
.toLocaleString(currentLanguage, {month: 'long', year: 'numeric'})
.replace(/^./, (str) => str.toUpperCase());

let datesHTML = '';
for (let i = firstDayIndex; i > 0; i--) {
const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);
datesHTML += `
<div class="date inactive">${prevDate.getDate()}</div>`;
}
for (let i = 1; i <= totalDays; i++) {
const date = new Date(currentYear, currentMonth, i);
const activeClass = date.toDateString() === new Date().toDateString() ? 'active' : '';
datesHTML += `
<div class="date ${activeClass}">${i}</div>`;
}
for (let i = 1; i <= (7 - lastDayIndex); i++) {
const nextDate = new Date(currentYear, currentMonth + 1, i);
datesHTML += `
<div class="date inactive">${nextDate.getDate()}</div>`;
}
datesElement.innerHTML = datesHTML;
};

prev.addEventListener('click', () => {
currentDate.setMonth(currentDate.getMonth() - 1);
updateCalendar();
});

next.addEventListener('click', () => {
currentDate.setMonth(currentDate.getMonth() + 1);
updateCalendar();
});

updateCalendar();

// Trigger modal when pressed on date of holiday
// Import holidays - Add date thing