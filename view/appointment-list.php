<?php require "../controller/Session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="../css/appointment-list.css">
    <link rel="stylesheet" href="../css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/office_filter.js"></script>
    <script type="text/javascript" src="../scripts/button_function.js"></script> 
    <script type="text/javascript" src="../scripts/notification.js"></script>
    <script type="text/javascript" src="../scripts/search.js"></script> 
    <script type="text/javascript" src="../scripts/sidebar_highlight.js"></script> 
    <style>
        .sign-out {
            width: calc(100% - 40px);
            font-size: 16px;
            padding: 15px;
            background-color: #374151;
            text-align: center;
            color: white;
            cursor: pointer;
            border: 2px solid #374151;
            border-radius: 15px;
            margin-top: 44.4vh;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
    <?php require "../components/sidebar.php"; ?>
        
    <div class="main-container">
        <!-- Header -->
        <div class="header">
            <h1>Sual Municipal Hall Admin Panel</h1>
            <div class="user-info">
                <?php require "../components/notification.php"?>
                <div class="user-info">
                    <span><?php echo $_SESSION["username"] ?></span>
                    <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="display">
                <h1>APPOINTMENT LIST</h1>
                <input type="text" class="search" placeholder="Search...">
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
                    <select id="office-filter" class="select-office">
                        <option value="" selected="selected">All Offices</option>
                        <option value="Office of the Municipal Mayor">Office of the Municipal Mayor</option>
                        <option value="Office of the Municipal Vice Mayor">Office of the Municipal Vice Mayor</option>
                        <option value="Office of the Human Resource Management Officer">Office of the Human Resource Management Officer</option>
                        <option value="Office of the Municipal Treasurer">Office of the Municipal Treasurer</option>
                        <option value="Office of the Municipal Secretary">Office of the Municipal Secretary</option>
                        <option value="Office of the Municipal Assessor">Office of the Municipal Assessor</option>
                        <option value="Office of the Municipal Budget Officer">Office of the Municipal Budget Officer</option>
                        <option value="Office of the Municipal Planning and Development Officer">Office of the Municipal Planning and Development Officer</option>
                        <option value="Office of the Municipal Engineer">Office of the Municipal Engineer</option>
                        <option value="Office of the Municipal Health Officer">Office of the Municipal Health Officer</option>
                        <option value="Office of the Municipal Civil Registrar">Office of the Municipal Civil Registrar</option>
                        <option value="Office of the Municipal Social Welfare and Development">Office of the Municipal Social Welfare and Development</option>
                        <option value="Office of the Municipal Agriculturist">Office of the Municipal Agriculturist</option>
                        <option value="COMELEC">COMELEC</option>
                    </select>
                </div>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr><th>Name</th>
                        <th>Occupant</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th></th></tr>
                    </thead>
                    <tbody class="appointment-list"></tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>