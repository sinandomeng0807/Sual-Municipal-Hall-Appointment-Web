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
}
?>