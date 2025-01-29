$(document).ready(function () {
    function setLanguage(language) {
        var languageDetails = {
            'pl': '<img src="pl.png" alt="pl_flag" class="me-2" style="height: 1em;"> Polska',
            'en': '<img src="ie.png" alt="ie_flag" class="me-2" style="height: 1em;"> Ireland',
            'de': '<img src="at.png" alt="at_flag" class="me-2" style="height: 1em;"> Österreich'
        };
        $('#selectedLanguage').html(languageDetails[language] || languageDetails['de']);
    }

    var urlParams = new URLSearchParams(window.location.search);
    var lang = urlParams.get('lang') || 'de';
    setLanguage(lang);
    if (typeof holidays === 'undefined') {
        console.error("Holidays array is not defined.");
        return;
    }
    const monthYearElement = document.getElementById('monthYear');
    const datesElement = document.getElementById('dates');
    const prev = document.getElementById('prev');
    const next = document.getElementById('next');
    let currentDate = new Date();
    const getHolidaysForMonth = (year, month) => {
        return holidays.filter(holiday => {
            const holidayDate = new Date(holiday.date);
            return holidayDate.getFullYear() === year && holidayDate.getMonth() === month;
        });
    };
    const updateCalendar = () => {
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        const firstDay = new Date(currentYear, currentMonth, 1);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const totalDays = lastDay.getDate();
        const firstDayIndex = (firstDay.getDay() + 6) % 7;
        const lastDayIndex = lastDay.getDay();
        monthYearElement.textContent = currentDate
            .toLocaleString(lang, {month: 'long', year: 'numeric'})
            .replace(/^./, (str) => str.toUpperCase());
        const monthHolidays = getHolidaysForMonth(currentYear, currentMonth);
        let datesHTML = '';
        for (let i = firstDayIndex; i > 0; i--) {
            const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);
            datesHTML += `<div class="date inactive">${prevDate.getDate()}</div>`;
        }
        for (let i = 1; i <= totalDays; i++) {
            const date = new Date(currentYear, currentMonth, i);
            const activeClass = date.toDateString() === new Date().toDateString() ? 'active' : '';
            let holidayClass = '';
            let holidayInfo = '';
            for (let holiday of monthHolidays) {
                const holidayDate = new Date(holiday.date);
                holidayDate.setHours(0, 0, 0, 0);
                if (date.toDateString() === holidayDate.toDateString()) {
                    holidayClass = 'holiday';
                    holidayInfo = holiday.name;
                    break;
                }
            }
            datesHTML += `
            <div class="date ${activeClass} ${holidayClass}" data-info="${holidayInfo}" data-date="${date.toISOString()}">${i}</div>`;
        }
        for (let i = 1; i <= (7 - lastDayIndex); i++) {
            const nextDate = new Date(currentYear, currentMonth + 1, i);
            datesHTML += `<div class="date inactive">${nextDate.getDate()}</div>`;
        }
        datesElement.innerHTML = datesHTML;
        document.querySelectorAll('.holiday').forEach(dateElement => {
            dateElement.addEventListener('click', function () {
                const holidayName = dateElement.getAttribute('data-info');
                const holidayDate = new Date(dateElement.getAttribute('data-date'));
                const formattedDate = holidayDate.toLocaleDateString(lang, {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
                const holidayDescription = `${holidayName} - ${formattedDate}`;
                $('#holidayInfo').text(holidayDescription);
                $('#holidayModal').modal('show');
            });
        });
    };
    prev.addEventListener('click', () => {
        currentDate.setDate(1);
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
    });
    next.addEventListener('click', () => {
        currentDate.setDate(1);
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
    });
    updateCalendar();
});