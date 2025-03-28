<?php
    require "../model/AppointmentsModel.php";

    class ManageList {
        public function getManageList() {
            $db = new AppointmentList();
            $get_list = $db->getList("1");
            $output = "";
            foreach ($get_list as $row) {
                $btn_func = $row['id'];
                $detail_btn = '<button class="view-btn" onclick="ViewManage('."'$btn_func'".')">View Details</button>';
                $delete_btn = '<button class="delete-btn"onclick="DeleteAppointment('."'$btn_func'".')">Delete</button>';
                if ($row["occupant"] == 'Resident') {
                    $location = $row["r_barangay"];
                } else {
                    $location = $row["v_province"];
                }
                if ($row["status"] == "pending") {
                    $status = "pending";
                    $status_btn = "<button class='pending-btn'>Pending</button>";
                } elseif ($row["status"] == "approve"){
                    $status = "approve";
                    $status_btn = "<button class='approve-btn'>Approved</button>";
                } elseif ($row["status"] == "decline"){
                    $status = "decline";
                    $status_btn = "<button class='decline-btn'>Declined</button>";
                }
                $output .= "<tr class='$status'>".
                    "<td>".
                        $row["r_name"].
                    "</td>".
                    "<td>".
                        $row["occupant"].
                    "</td>".
                    "<td>".
                    $location.
                    "</td>".
                    "<td>".
                        $row["r_contact"].
                    "</td>".
                    "<td>".
                        $row["office"].
                    "</td>".
                    "<td class='action-status'>".
                    "$delete_btn".
                    "</td>".
                    "<td class='action-status'>".
                    "$detail_btn".
                    "</td>".
                    "<td class='action-status'>".
                    $status_btn.
                    "</td>".
                "</tr>";
            }
            $data = array('list' => $output);
            return json_encode($data);
        }
    }
?>