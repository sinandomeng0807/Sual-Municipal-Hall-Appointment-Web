<?php
class Admin{
    private $db;

    private function __construct() {
        $database = new mysqli("localhost", "root", "", "sual_municipal_hall");
        $conn = $database->connect();
        $this->db = $conn;
    }

    public function checkAdminID($id){
        $query = $query = "SELECT * FROM admin WHERE employee_id = '$id'";
        $check= $this->db->query($query);
        $count = mysqli_num_rows($check);
        return $count;
    }
}
?>