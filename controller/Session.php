<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../view/index.php");
    exit();
}
?>