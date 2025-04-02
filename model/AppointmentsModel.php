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

    public function getToday() {
        $current_date = date("Y-m-d");
        $query = "SELECT * FROM appointments WHERE date='$current_date'";
        return $this->db->query($query);
    }

    public function getWeek() {
        $monday = date("Y-m-d", strtotime("monday this week"));
        $sunday = date("Y-m-d", strtotime("sunday this week"));
        $query = "SELECT date FROM appointments WHERE NOT (date <= '$monday' OR date >= '$sunday')";
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
        $query = "UPDATE appointments SET status='approve' WHERE id='$id'";
        $this->db->query($query);
    }

    public function deleteAppointment($id) {
        $query = "DELETE FROM appointments WHERE id='$id'";
        $this->db->query($query);
    }

    public function addAppointment($office, $date, $time, $name, $address, $barangay, $contact, $email, $zipcode, $province, $occupant, $purpose, $front, $back, $selfie) {
        $stmt = $this->db->prepare("INSERT INTO appointments (`office`, `date`, `time`, `r_name`, `r_address`, `r_barangay`, `r_contact`, `r_email`, `v_zip`, `v_province`, `occupant`, `purpose`, `front_photo_path`, `back_photo_path`, `selfie_photo_path`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssss", $office, $date, $time, $name, $address, $barangay, $contact, $email, $zipcode, $province, $occupant, $purpose, $front, $back, $selfie);
        $stmt->execute();
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