<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$servername = "localhost";
$username = "root";
$password = "";     
$dbname = "sual_municipal_hall"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit();
}

// Check if request contains files and JSON data
if (!isset($_FILES['frontPhoto'], $_FILES['backPhoto'], $_FILES['selfiePhoto'], $_POST['appointment'])) {
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

$input = $_POST['appointment'];
$data = json_decode($input, true);

if (
    empty($data['officeTextView']) ||
    empty($data['purposeTextView']) ||
    empty($data['dateTextView']) ||
    empty($data['timeTextView'])
    
) {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
    exit();
}

$stmt = $conn->prepare("INSERT INTO appointments (
    occupant, office, purpose, date, time, other, 
    r_name, r_address, r_barangay, r_contact, r_email, 
    v_zip, v_province, front_photo_path, back_photo_path, selfie_photo_path
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "ssssssssssssssss",
    $data['occupantTextView'],
    $data['officeTextView'],
    $data['purposeTextView'],
    $data['dateTextView'],
    $data['timeTextView'],
    $data['otherTextView'],
    $data['rNameTextView'],
    $data['rAddressTextView'],
    $data['rBarangayTextView'],
    $data['rContactTextView'],
    $data['rEmailTextView'],
    $data['vZipTextView'],
    $data['vProvinceTextView'],
    $frontPhotoPath,
    $backPhotoPath,
    $selfiePhotoPath
);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Appointment and photos submitted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to submit appointment"]);
}

$stmt->close();
$conn->close();
?>
