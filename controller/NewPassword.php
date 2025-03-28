<?php
require "../model/AdminModel.php";

if (isset($_POST["check_id"])) {
    $admin = new Admin();
    $does_exist = "";
    if ($admin->checkAdminID($_POST["check_id"]) != 0) {
        $does_exist = "yes";
    } else {
        $does_exist = "no";
    }

    $data = array (
        "check_id" => $does_exist
    );

    echo json_encode($data);
}

if (isset($_POST["change_pass"])){
    $admin = new Admin();
    $newpass = $_POST["password"];
    echo $admin->changePassword($_POST["change_pass"], $newpass);
}
?>