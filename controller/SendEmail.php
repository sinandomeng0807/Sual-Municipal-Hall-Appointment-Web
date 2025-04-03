<?php
require "../model/AppointmentsModel.php";
require "../model/EmailModel.php";

$mail = new EmailSender();

if (isset($_POST)) {
    $appointment = new AppointmentList();
    $pd = $appointment->getDetails($_POST["id"]);
    $approve_body = "";
    $decline_body = "";
    if ($_POST["status"] == "decline") {
        echo  $mail->send($pd["r_email"], $pd["r_name"], "Appointment Declined", $decline_body);
    } else if ($_POST["status"] == "approve") {
        echo $mail->send($pd["r_email"], $pd["r_name"], "Appointment Approved", $approve_body);
    }
}
?>