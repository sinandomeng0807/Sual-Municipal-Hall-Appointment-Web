<?php
$conn = new mysqli("localhost", "root", "", "sual_municipal_hall");
if ($conn->connect_error) {
    die("Connection Failed due to ". $conn->connect_error);
}

$query = "SELECT * FROM appointments";
$get_appointment_data = $conn->query($query);
foreach ($get_appointment_data as $row){
    $btn_func = $row['id'];
    $detail_btn = '<button class="view-btn" onclick="ViewDetails('."'$btn_func'".')">View Details</button>';
    if ($row["occupant"] == 'Resident') {
        $location = $row["r_barangay"];
        $row_class = "resident";
    } else {
        $location = $row["v_province"];
        $row_class = "visitor";
    }
    echo "<tr class='$row_class'>",
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
        "<td>$detail_btn</td>",
    "</tr>";
}
$conn->close();