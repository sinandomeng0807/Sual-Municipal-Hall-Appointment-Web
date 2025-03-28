function ViewDetails(id) {
    var form = $('<form action="list-detail.php" method="POST">' + '<input type="hidden" name="appointment_id" id="appointment_id" value="'+id+'">' + '</form>');
    //$.post("database-connection/login.php", {'employee_id' : appointment_id, 'password': 'password'}, function(){window.location.href='database-connection/login.php'});
    $('body').append(form);
    form.submit();
}

function ViewManage(id) {
    var form = $('<form action="manage-page.php" method="POST">' + '<input type="hidden" name="appointment_id" id="appointment_id" value="'+id+'">' + '</form>');
    //$.post("database-connection/login.php", {'employee_id' : appointment_id, 'password': 'password'}, function(){window.location.href='database-connection/login.php'});
    $('body').append(form);
    form.submit();
}

function DeleteAppointment(id) {
    if (confirm("Are you sure you want to delete this appointment?")) {
        $.post(
            "../controller/ListDetailController.php",
            {
                delete_id:id
            }
        );
        alert("Appointment deleted successfully!");
        window.open("manage-appointment.php", "_self");
    }
}