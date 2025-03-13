<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "sual_municipal_hall");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if ($_POST['status'] == 'approve'){
            $appoint_id = $_POST['id'];
            $stmt = $conn->prepare("UPDATE appointments SET status='approve' WHERE id='$appoint_id'");
            $stmt->execute();
            $stmt->close();
            $conn->close();
        } elseif ($_POST['status'] == 'decline') {
            $appoint_id = $_POST['id'];
            $stmt = $conn->prepare("UPDATE appointments SET status='decline' WHERE id='$appoint_id'");
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    }
}