<?php
require_once("connection.php");
$num_pending = $conn->prepare("SELECT id FROM appointments WHERE status = 'pending'");
$num_pending->execute();
$num_pending->store_result();
$num_appointment = $conn->prepare("SELECT id FROM appointments WHERE 1");
$num_appointment->execute();
$num_appointment->store_result();
$num_approved = $conn->prepare("SELECT id FROM appointments WHERE status = 'approved'");
$num_approved->execute();
$num_approved->store_result();
$num_rejected = $conn->prepare("SELECT id FROM appointments WHERE status = 'rejected'");
$num_rejected->execute();
$num_rejected->store_result();
