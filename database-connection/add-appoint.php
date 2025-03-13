<?php
$conn = new mysqli("localhost", "root", "", "sual_municipal_hall");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the username already exists
$stmt = $conn->prepare("INSERT INTO appointments (`office`, `date`, `time`, `r_name`, `r_address`, `r_barangay`, `r_contact`, `r_email`, `v_zip`, `v_province`, `occupant`, `purpose`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $_POST['office'], $_POST['date'], $_POST['time'], $_POST['name'], $_POST['address'], $_POST['barangay'], $_POST['contact'], $_POST['email'], $_POST['zip_code'], $_POST['province'], $_POST['occupant'], $_POST['purpose']);
$stmt->execute();

$stmt->close();
$conn->close();
?>