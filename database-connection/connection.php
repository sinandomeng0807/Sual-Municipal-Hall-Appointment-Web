<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "appointment";
    $table = "personal_data";
    $conn = mysqli_connect($server, $username, $password, $database) or die('UNABLE TO CONNECT');
