<?php
require "../model/AppointmentsModel.php";

if(isset($_POST)){
    $get_data = new AppointmentList();
    $appointments = $get_data->getAppointmentCount();
    $today_appointments = $get_data->getToday();
    $today = "";
    if (mysqli_num_rows($today_appointments) < 1){
        $today .= "<tr><td colspan='5'><center>No appointments today</center><td><tr>";
    } else {
        foreach ($today_appointments as $row) {
            $today .= "<tr class='border-b'>".
                    "<td class='p-2 text-left'>".
                    $row["r_name"].
                    "</td>".
                    "<td class='p-2 text-left'>".
                    $row["occupant"].
                    "</td>".
                    "<td class='p-2 text-left'>".
                    $row["office"].
                    "</td>".
                    "<td class='p-2 text-left'>".
                    $row["date"].
                    "</td>".
                    "<td class='p-2 text-left'>".
                    $row["time"].
                    "</td>".
                    "</tr>";
        }
    }
    $week = array();
    $weekly = $get_data->getWeek();
    if (mysqli_num_rows($weekly) < 1){
    } else {
        foreach ($weekly as $row) {
            $week[] = date('D', strtotime($row["date"]));
        }
    }

    $week_day = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    $count_day = array_count_values($week);
    $get_day_occurence = array();

    foreach ($week_day as $day) {
        $get_day_occurence[$day] = isset($count_day[$day]) ? $count_day[$day] : 0;
    }


    $data = array(
        "all"=>$appointments["all"],
        "pending"=>$appointments["pending"],
        "decline"=>$appointments["decline"],
        "approve"=>$appointments["approve"],
        "today"=>$today,
        "weekly"=>$get_day_occurence,
    );
    echo json_encode($data);
}
?>