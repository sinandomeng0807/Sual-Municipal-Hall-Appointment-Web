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
}
?>