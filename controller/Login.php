<?php
session_start();
require "../model/AdminModel.php";

if (isset($_POST)){
    $admin = new Admin();
    $username = $_POST["username"];
    $password = $_POST["password"];
    $row = $admin->getLogin($username);

    if ($password == $row["password"]) {
        $_SESSION["username"] = $username;
        $data = array ("location"=>"./view/dashboard.php");
        echo json_encode($data);
    } else {
        $data = array ("error" => "Login Failed... Check Username or Password...");
        echo json_encode($data);
    }
}
?>