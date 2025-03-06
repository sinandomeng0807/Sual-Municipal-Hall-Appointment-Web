<?php
require_once("connection.php");
$currentdate = date("y-m-d");
$query = "SELECT * FROM $table WHERE date = '$currentdate'";
$get_appointment_data = $conn->query($query);
while ($row = mysqli_fetch_assoc($get_appointment_data)){
    echo "<tr class='border-b'>",
        "<td class='p-2 text-left'>",
            $row["r_name"],
        "</td>",
        "<td class='p-2 text-left'>",
            $row["occupant"],
        "</td>",
        "<td class='p-2 text-left'>",
            "Appointment",
        "</td>",
        "<td class='p-2 text-left'>",
            $row["date"],
        "</td>",
        "<td class='p-2 text-left'>",
            $row["time"],
        "</td>",
    "</tr>";
} 
