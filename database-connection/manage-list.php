<?php
require_once("connection.php");
$query = "SELECT * FROM $table";
$get_appointment_data = $conn->query($query);
while ($row = mysqli_fetch_assoc($get_appointment_data)){
    if ($row["occupant"] == 'Resident') {
        $location = $row["r_barangay"];
    } else {
        $location = $row["v_province"];
    }
    echo "<tr>",
        "<td>",
            $row["r_name"],
        "</td>",
        "<td>",
            $row["occupant"],
        "</td>",
        "<td>",
        $location,
        "</td>",
        "<td>",
            $row["r_contact"],
        "</td>",
        "<td>",
            $row["r_email"],
        "</td>",
        "<td class='action-status'>",
        "<button class='view-btn' onclick=''> View Details</button>",
        "</td>",
        "<td class='action-status'>",
        "<button class='approve-btn'>Approve</button>",
        "</td>",
    "</tr>";
}
mysqli_close($conn);