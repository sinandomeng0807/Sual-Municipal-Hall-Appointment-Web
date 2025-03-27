<?php
class Notification {
    private $db;

    public function __construct() {
        $database = new mysqli("localhost", "root", "", "sual_municipal_hall");
        $conn = $database->connect();
        $this->db = $conn;
    }

    private function updateNotificationTable() {
        $query = "INSERT INTO notification (notify_id, notify_name, notify_appoint)
        SELECT id, r_name, status FROM appointments appnt
        WHERE NOT EXISTS (
        SELECT 1
        FROM notification ntfy
        WHERE ntfy.notify_id = appnt.id and ntfy.notify_appoint = appnt.status)";
        $this->db->query($query);
    }

    public function fetchNotification() {
        $this->updateNotificationTable();
        $query = "SELECT * FROM notification ORDER BY notification_created DESC LIMIT 5";
        return $this->db->query($query);
    }

    public function getUnseenCount(){
        $query = $query = "SELECT * FROM notification WHERE notify_seen = 'no'";
        $get_notifications = $this->db->query($query);
        $count = mysqli_num_rows($get_notifications);
        return $count;
    }

    public function updateSeenNotification(){
        $notification_seen = "UPDATE notification SET notify_seen = 'yes' WHERE notify_seen = 'no'";
        $this->db->query($notification_seen);
    }
}
?>