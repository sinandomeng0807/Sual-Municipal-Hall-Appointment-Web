<?php
require "../model/AppointmentsModel.php";
if (isset($_POST)){
    $change_status = new AppointmentList();
    if ($_POST['status'] == 'approve'){
        $change_status->approveAppointment($_POST["id"]);
    } elseif ($_POST['status'] == 'decline') {
        $change_status->declineAppointment($_POST["id"]);
    }
}
?>