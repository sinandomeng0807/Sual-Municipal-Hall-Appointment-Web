<?php
require "DatabaseConnection.php";


class AppointmentList {
    private $db;

    public function __construct() {
        $database = new DatabaseConnection();
        $conn = $database->connect();
        $this->db = $conn;
    }

    public function getList($office) {
        $query = "SELECT * FROM appointments WHERE $office";
        return $this->db->query($query);
    }

    public function getDetails($id) {
        $query = "SELECT * FROM appointments WHERE id='$id'";
        $row = $this->db->query($query);
        return $row->fetch_assoc();
    }

    public function declineAppointment($id) {
        $query = "UPDATE appointments SET status='decline' WHERE id='$id'";
        $this->db->query($query);
    }

    public function approveAppointment($id) {
        $query = "UPDATE appointments SET status='decline' WHERE id='$id'";
        $this->db->query($query);
    }

    public function deleteAppointment($id) {
        $query = "DELETE FROM appointments WHERE id='$id'";
        $this->db->query($query);
    }

    public function getAppointmentCount(){
        $query = "SELECT * FROM appointments";
        $decline = "SELECT * FROM appointments WHERE status='decline'";
        $approve = "SELECT * FROM appointments WHERE status='approve'";
        $pending = "SELECT * FROM appointments WHERE status='pending'";
        $get_count = $this->db->query($query);
        $get_count_d = $this->db->query($decline);
        $get_count_a = $this->db->query($approve);
        $get_count_p = $this->db->query($pending);
        $all = mysqli_num_rows($get_count);
        $decline = mysqli_num_rows($get_count_d);
        $approve = mysqli_num_rows($get_count_a);
        $pending = mysqli_num_rows($get_count_p);
        return array(
            "all"=>$all,
            "decline"=>$decline,
            "approve"=>$approve,
            "pending"=>$pending
        );
    }
}
?>