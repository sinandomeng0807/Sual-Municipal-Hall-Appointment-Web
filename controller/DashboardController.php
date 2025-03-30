<?php
require "../model/AppointmentsModel.php";

if(isset($_POST)){
    $get_data = new AppointmentList();
    $appointments = $get_data->getAppointmentCount();
    $data = array(
        "all"=>$appointments["all"],
        "pending"=>$appointments["pending"],
        "decline"=>$appointments["decline"],
        "approve"=>$appointments["approve"]
    );
    echo json_encode($data);
}
?>