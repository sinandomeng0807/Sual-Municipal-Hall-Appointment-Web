<?php
require "../model/AppointmentsModel.php";
require "../model/EmailModel.php";

$mail = new EmailSender();

if (isset($_POST)) {
    $appointment = new AppointmentList();
    $pd = $appointment->getDetails($_POST["id"]);
    if ($_POST["status"] == "decline") {
        echo  $mail->send($pd["r_email"], $pd["r_name"], "Appointment Declined", "Sorry but your appointment has been declined");
    } else if ($_POST["status"] == "approve") {
        echo $mail->send($pd["r_email"], $pd["r_name"], "Appointment Approved", "Congratulations your appointment has been approved");
    }
}
?>