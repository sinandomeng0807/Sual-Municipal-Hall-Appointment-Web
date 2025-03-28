<?php
    require "../model/AppointmentsModel.php";

    if (isset($_POST["id"])) {
        $detail = new AppointmentList();
        $pd = $detail->getDetails($_POST["id"]); 
        $data = array (
            "id" => $_POST["id"],
            "occupant" => $pd["occupant"],
            "name" => $pd["r_name"],
            "date"=> $pd["date"],
            "time" => $pd["time"],
            "address" => $pd["r_address"],
            "email" => $pd["r_email"],
            "brgy" => $pd["r_barangay"],
            "contact" => $pd["r_contact"],
            "office" => $pd["office"],
            "purpose" => $pd["purpose"],
            "front" => $pd["front_photo_path"],
            "back" => $pd["back_photo_path"],
            "selfie" => $pd["selfie_photo_path"]
        );
        echo json_encode($data);
    }

    if (isset($_POST["delete_id"])) {
        $delete = new AppointmentList();
        $delete->deleteAppointment($_POST["delete_id"]);
    }
?>