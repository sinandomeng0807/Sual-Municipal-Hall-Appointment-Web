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
    <link rel="stylesheet" href="css/appointment-list.css">
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
                <h1>APPOINTMENT LIST</h1>
                <input type="text" placeholder="Search...">
            </div>
            
                <div class="filter-container">
                    <div class="category-filters">
                    <label>Filter by Category:</label>
                    <input type="radio" name="category" value="All"> All
                    <input type="radio" name="category" value="Residents"> Residents
                    <input type="radio" name="category" value="Visitors"> Visitors
                </div>
                <div class="office-filter">
                    <label for="office-filter">Filter by Office:</label>
                    <select id="office-filter">
                        <option value="">All Offices</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Mayor</option>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Vice Mayor</option>
                        <option value="Office of the Municipal Mayor">Office of the Human Management Office</option>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Treasurer</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Secretary</option>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Assessor</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Budget Office</option>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Planning and Development Office</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Engineer</option>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Health Office</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Civil Registrar</op   tion>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Social Welfare and Development</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Agriculturist</option>
                    </select>
                </div>
            </div>
            <div class="table-container">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Residence</th>
                        <th>Location</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    <?php
                    require_once("database-connection/appoinment-list.php")
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
