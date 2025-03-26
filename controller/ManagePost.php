<?php
    require "ManageController.php";

    if (isset($_POST)) {
        $appointments = new ManageList();
        echo $appointments->getManageList();
    }
?>