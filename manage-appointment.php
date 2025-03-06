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
    <link rel="stylesheet" href="css/manage-appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="Photos/logo.png" alt="Logo">
        </div>
            <ul class="menu">
                <li><a href="dashboard.php"><i class="fa-solid fa-gauge mr-3"></i> Dashboard</a></li>
                <li><a href="appointment-list.php"><i class="fa-solid fa-list mr-3"></i> Appointment List</a></li>
                <li><a href="manage-appointment.php"><i class="fa-solid fa-list-check"></i> Manage Appointment</a></li>
                <li><a href="add-appointment.php"><i class="fa-solid fa-plus mr-3"></i> Add Appointment</a></li>
            </ul>
            <div class="sign-out"onclick="window.location.href='database-connection/logout.php'"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out</div>
        </div>
    <div class="main-container">
        <div class="header">
            <h1>Sual Municipal Hall Admin Panel</h1>
            <div class="user">
                <span><?php echo $_SESSION['employee_id']; ?></span>
                <div class="user-icon"></div>
            </div>
        </div>
        <div class="content">
            <div class="display">
                <h1>MANAGE APPOINTMENT</h1>
                <input type="te xt" placeholder="Search...">
            </div>

            <div class="filter-container">
                <label>Appointment:</label>
                <input type="radio" name="category" value="All" checked>All
                <input type="radio" name="category" value="Approve">Approve
                <input type="radio" name="category" value="Pending">Pending
                <input type="radio" name="category" value="Decline">Decline
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Residence</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            require_once("database-connection/manage-list.php");
                        ?>
                        <tr>
                            <td>Manalo, James R</td>
                            <td>Resident</td>
                            <td>Poblacion</td>
                            <td>09333333333</td>
                            <td>james@gmail.com</td>
                            <td class="action-status">
                                <button class="view-btn" onclick="window.location.href='resident-request.php'"> View Details</button>
                            </td>
                            <td class="action-status">
                                <button class="approve-btn">Approve</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
