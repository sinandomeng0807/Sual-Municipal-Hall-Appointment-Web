<?php
$conn = new mysqli("localhost", "root", "", "sual_municipal_hall");
if ($conn->connect_error) {
    die("Connection Failed due to ". $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $appointment_id = $_POST['appointment_id'];
    $query = "SELECT * FROM appointments WHERE id='$appointment_id'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    // $query = $conn->prepare("SELECT * FROM appointments WHERE id=?");
    // $query->bind_param("s", $appointment_id);
    // $query->execute();
    // $result = $query->get_result();
    // $row = $result->fetch_assoc();
    $name = $row['r_name'];
}
?>

<?php
echo $name;
?>