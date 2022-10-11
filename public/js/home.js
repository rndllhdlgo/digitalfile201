//Display current date and time
const d = new Date().toDateString();
const t = new Date().toLocaleTimeString();
document.getElementById("date").innerHTML = d + ' ' + t;

