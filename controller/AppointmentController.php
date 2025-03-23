<?php 
    require "../model/AppointmentsModel.php";

    class AppointmentController {
        public function appointmentList($office) {
            switch ($office){
                case "Office of the Municipal Mayor":
                    $office = "office='Office of the Municipal Mayor'";
                    break;
                case "Office of the Municipal Vice Mayor":
                    $office = "office='Office of the Municipal Vice Mayor'";
                    break;
                case "Office of the Human Resource Management Officer":
                    $office = "office='Office of the Human Resource Management Officer'";
                    break;
                case "Office of the Municipal Treasurer":
                    $office = "office='Office of the Municipal Treasurer'";
                    break;
                case "Office of the Municipal Secretary":
                    $office = "office='Office of the Municipal Secretary'";
                    break;
                case "Office of the Municipal Assessor":
                    $office = "office='Office of the Municipal Assessor'";
                    break;
                case "Office of the Municipal Budget Officer":
                    $office = "office='Office of the Municipal Budget Officer'";
                    break;
                case "Office of the Municipal Planning and Development Officer":
                    $office = "office='Office of the Municipal Planning and Development Officer'";
                    break;
                case "Office of the Municipal Engineer":
                    $office = "office='Office of the Municipal Engineer'";
                    break;
                case "Office of the Municipal Health Officer":
                    $office = "office='Office of the Municipal Health Officer'";
                    break;
                case "Office of the Municipal Civil Registrar":
                    $office = "office='Office of the Municipal Civil Registrar'";
                    break;
                case "Office of the Municipal Social Welfare and Development":
                    $office = "office='Office of the Municipal Social Welfare and Development'";
                    break;
                case "Office of the Municipal Agriculturist":
                    $office = "office='Office of the Municipal Agriculturist'";
                    break;
                case "COMELEC":
                    $office = "office='COMELEC'";
                    break;
                default:
                    $office = "1";
            }
            $db = new AppointmentList();
            $get_list = $db->getList($office);
            $output = "";
            foreach ($get_list as $row) {
                $btn_func = $row['id'];
                $detail_btn = '<button class="view-btn" onclick="ViewDetails('."'$btn_func'".')">View Details</button>';
                if ($row["occupant"] == 'Resident') {
                    $location = $row["r_barangay"];
                    $row_class = "resident";
                } else {
                    $location = $row["v_province"];
                    $row_class = "visitor";
                }
                $output .= 
                "<tr class='$row_class'>".
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
                    $row["r_email"].
                "</td>".
                "<td>$detail_btn</td>".
                "</tr>";
            }
            $data = array('list' => $output);
            return json_encode($data);
        }
    }
?>