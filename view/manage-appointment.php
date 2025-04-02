<?php require "../controller/Session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="../css/manage-appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../css/notifications.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/notification.js"></script>
    <script type="text/javascript" src="../scripts/search.js"></script> 
    <script type="text/javascript" src="../scripts/button_function.js"></script>
    <script type="text/javascript" src="../scripts/manage_list.js"></script>
    <script type="text/javascript" src="../scripts/sidebar_highlight.js"></script> 
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <?php require "../components/sidebar.php" ?>

        <div class="main-container">
        <!-- Header -->
        <div class="header">
            <h1>Sual Municipal Hall Admin Panel</h1>
            <div class="user-info">
                <?php require "../components/notification.php" ?>
                <div class="user-info">
                    <span><?php echo $_SESSION["username"] ?></span>
                    <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="display">
                <h1>MANAGE APPOINTMENT</h1>
                <input type="te xt" class="search" placeholder="Search...">
            </div>

            <div class="filter-container">
                <label>Appointment:</label>
                <input type="radio" name="category" value="All" checked>All
                <input type="radio" name="category" value="Approve">Approved
                <input type="radio" name="category" value="Pending">Pending
                <input type="radio" name="category" value="Decline">Declined
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Residents</th>
                            <th>Barangay</th>
                            <th>Number</th>
                            <th>Office</th>
                            <th></th>
                            <th></th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="appointment-list">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
