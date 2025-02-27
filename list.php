<?php
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <button onclick="window.location.href='list.php'"><i class="fa-solid fa-clipboard-list"></i> Appointment List</button>
        <button onclick="window.location.href='status.html'"><i class="fa-solid fa-gauge"></i> Appointment Status</button>
        <button onclick="window.location.href='manage.html'"><i class="fa-solid fa-pen-to-square"></i> Manage Appointment</button>
        <button onclick="window.location.href='details.html'"><i class="fa-solid fa-cloud"></i> Appointment Details</button>
        <button id="first" onclick="window.location.href='database-connection/logout.php'">Sign Out</button>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>APPOINTMENT LIST</h1>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Barangay</th>
                    <th>Contact</th>
                    <th>Email Address</th>
                    <th>Occupant</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>James</td>
                    <td>22 Purok 3</td>
                    <td>Poblacion</td>
                    <td>0933333333</td>
                    <td>James@gmail.com</td>
                    <td>Resident</td>
                    <td><button class="view-btn">View Appointment Request</button></td>
                </tr>
                <tr>
                    <td>James</td>
                    <td>22 Purok 3</td>
                    <td>Poblacion</td>
                    <td>0933333333</td>
                    <td>James@gmail.com</td>
                    <td>Resident</td>
                    <td><button class="view-btn">View Appointment Request</button></td>
                </tr>
                <!-- Repeat rows as needed -->
            </table>
            <div class="pagination">
                <span>Showing 1 to 10 of 100 entries</span>
                <div class="pagination-buttons">
                    <button class="page-btn" onclick="window.location.href='list.html'">Previous</button>
                    <button class="page-btn active">1</button>
                    <button class="page-btn" onclick="window.location.href='list2.html'">2</button>
                    <button class="page-btn">3</button>
                    <button class="page-btn">4</button>
                    <button class="page-btn" onclick="window.location.href='list2.html'">Next</button>
            </div>
        </div>
    </div>
</body>
</html>