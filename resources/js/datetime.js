document.addEventListener('DOMContentLoaded', () => {
    const dateDiv = document.getElementById('formattedDate');
    if (!dateDiv) return;

    // Get Laravel date from data attribute
    const dateFromLaravel = dateDiv.dataset.date; // "2026-02-26 22:00:00"
    const date = new Date(dateFromLaravel);

    // Weekday bold
    const weekday = new Intl.DateTimeFormat('en-US', { weekday: 'long' }).format(date);

    // Rest of the date
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: '2-digit',
        hour12: true
    };
    const restOfDate = new Intl.DateTimeFormat('en-US', options).format(date);

    // Insert into HTML
    dateDiv.innerHTML = `<span class="font-bold">${weekday}</span> <span class="text-[10px] mt-1 ">${restOfDate}</span>`;
});