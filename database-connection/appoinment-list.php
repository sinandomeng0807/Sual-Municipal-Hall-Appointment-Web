<?php
require_once("connection.php");
$query = "SELECT full_name, complete_address, barangay, province, contact_number, email_address, occupant FROM $table";
$get_appointment_data = $conn->query($query);
while ($row = mysqli_fetch_assoc($get_appointment_data)){
    echo "<tr>",
        "<td>",
            $row["full_name"],
        "</td>",
        "<td>",
            $row["complete_address"],
        "</td>",
        "<td>",
            $row["barangay"],
        "</td>",
        "<td>",
            $row["contact_number"],
        "</td>",
        "<td>",
            $row["email_address"],
        "</td>",
        "<td>",
            $row["occupant"],
        "</td>",
        "<td><button class='view-btn'>View Appointment Request</button></td>",
    "</tr>";
}
mysqli_close($conn);