<?php
class DatabaseConnection {
    public function connect() {
        return new mysqli("localhost", "root", "", "sual_municipal_hall");
    }
}
?>