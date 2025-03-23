<?php 
    require "AppointmentController.php";

    if (isset($_POST['office'])) {
        $appointments = new AppointmentController();
        echo $appointments->appointmentList($_POST["office"]);
    }
?>