<?php
$conn = new mysqli("localhost", "root", "", "sual_municipal_hall");
$table = "appointments";
$query = "SELECT * FROM $table ORDER BY created_at DESC";
$get_appointment_data = $conn->query($query);
while ($row = mysqli_fetch_assoc($get_appointment_data)){
    $btn_func = $row['id'];
    $detail_btn = '<button class="view-btn" onclick="ViewDetails('."'$btn_func'".')">View Details</button>';
    if ($row["occupant"] == 'Resident') {
        $location = $row["r_barangay"];
    } else {
        $location = $row["v_province"];
    }
    if ($row["status"] == "pending") {
        $status = "pending";
    } elseif ($row["status"] == "approve"){
        $status = "approve";
    } elseif ($row["status"] == "decline"){
        $status = "decline";
    }
    echo "<tr class='$status'>",
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
        "$detail_btn",
        "</td>",
        "<td class='action-status'>",
        "<button class='approve-btn'>Approve</button>",
        "</td>",
    "</tr>";
}
mysqli_close($conn);