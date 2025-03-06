<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Connect to the database
$servername = "localhost";
$username = "root"; // Change if needed
$password = "";     // Change if needed
$dbname = "sual_municipal_hall"; // database name

$conn = new mysqli($servername, $username, $password, $dbname);

// connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit();
}

// JSON input
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Validate input
if (
    empty($data['officeTextView']) ||
    empty($data['purposeTextView']) ||
    empty($data['dateTextView']) ||
    empty($data['timeTextView'])
    // required fields here
) {
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
    exit();
}

// SQL statement
$stmt = $conn->prepare("INSERT INTO appointments (occupant, office, purpose, date, time, other, r_name, r_address, r_barangay, r_contact, r_email, v_zip, v_province)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param(
    "sssssssssssss",
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
    $data['vProvinceTextView']
    
);

// Execute the query
if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Appointment submitted successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to submit appointment"]);
}

// Close connection
$stmt->close();
$conn->close();
?>
