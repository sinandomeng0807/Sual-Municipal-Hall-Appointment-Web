<?php
header('Content-Type: application/json');
require "../model/AppointmentsModel.php";

if (isset($_POST)) {
    $appointment = new AppointmentList();

    $name = $_POST["name"];
    $date = $_POST["date"];
    $occupant = $_POST["occupant"];
    $time = $_POST["time"];
    $address = $_POST["address"];
    $office = $_POST["office"];
    $barangay = $_POST["barangay"];
    $zip_code = $_POST["zip_code"];
    $province = $_POST["province"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $purpose = $_POST["purpose"];

    if (!isset($_FILES['frontPhoto'], $_FILES['backPhoto'], $_FILES['selfiePhoto'])) {
        echo json_encode(["status" => "error", "message" => "Missing required files or data"]);
        exit();
    }
    

    // File directory
    $uploadsDir = "../Photos/uploads/";
    if (!file_exists($uploadsDir)) {
        mkdir($uploadsDir, 0777, true);
    }

    //photos with unique names
    $frontPhotoPath = $uploadsDir . uniqid("front_") . ".jpg";
    $backPhotoPath = $uploadsDir . uniqid("back_") . ".jpg";
    $selfiePhotoPath = $uploadsDir . uniqid("selfie_") . ".jpg";

    if (!move_uploaded_file($_FILES['frontPhoto']['tmp_name'], $frontPhotoPath) ||
        !move_uploaded_file($_FILES['backPhoto']['tmp_name'], $backPhotoPath) ||
        !move_uploaded_file($_FILES['selfiePhoto']['tmp_name'], $selfiePhotoPath)) {
        echo json_encode(["status" => "error", "message" => "File upload failed"]);
        exit();
    }

    $appointment->addAppointment($office, $date, $time, $name, $address, $barangay, $contact, $email, $zip_code, $province, $occupant, $purpose, $frontPhotoPath, $backPhotoPath, $selfiePhotoPath);
    header("Location: ../view/appointment-list.php");
}
?>