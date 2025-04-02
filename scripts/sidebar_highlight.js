$(document).ready(function(){
    if (document.URL.includes("appointment-list.php")) {
        $("#list").addClass("active");
    } else if (document.URL.includes("manage-appointment.php")) {
        $("#manage").addClass("active");
    } else if (document.URL.includes("add-appointment.php")) {
        $("#add").addClass("active");
    } 
})
