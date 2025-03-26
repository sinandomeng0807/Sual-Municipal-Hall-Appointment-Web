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