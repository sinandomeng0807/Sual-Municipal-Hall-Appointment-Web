<?php 
    require "NotificationController.php";

    if (isset($_POST['view'])) {
        $appointments = new NotificationList();
        echo $appointments->getNotification($_POST["view"]);
    }
?>