<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST["employee_id"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "employee");
    
    if ($conn->connect_error) {
        die("Connection Failed due to ". $conn->connect_error);
    }

    if ($query = $conn->prepare("SELECT password FROM admin WHERE employee_id = ?")) {
        $query->bind_param("s", $employee_id);
        $query->execute();
        $query->bind_result($admin_password);
        $query->fetch();

        if ($password == $admin_password) {
            $_SESSION['employee_id'] = $employee_id;
            header("Location: ./../list.php");
            exit();
        } else {
            echo "Invalid Password or Username UwU";
        }
        
        $query->close();
    }
    $conn->close();
}

?>