<?php
require "DatabaseConnection.php";
class Admin{
    private $db;

    public function __construct() {
        $database = new DatabaseConnection();
        $conn = $database->connect();
        $this->db = $conn;
    }

    public function getLogin($username){
        $query = $query = "SELECT password FROM admin WHERE username = '$username'";
        $row = $this->db->query($query);
        return $row->fetch_assoc();
    }

    public function checkAdminID($id){
        $query = $query = "SELECT * FROM admin WHERE employee_id = '$id'";
        $check= $this->db->query($query);
        $count = mysqli_num_rows($check);
        return $count;
    }

    public function changePassword($id, $newpassword){
        $query = "UPDATE admin SET password='$newpassword' WHERE employee_id = '$id'";
        $this->db->query($query);
    }
}
?>