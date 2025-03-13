<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="css/appointment-list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/notifications.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </script>
    <script>
    $(document).ready(function(){
        $("input[type=radio][name=category]").change(function(){
            var category_val = $("input[type=radio][name=category]:checked").val();
            if (category_val == "Visitors") {
                $(".resident").hide();
                $(".visitor").show();
            } else if (category_val == "Residents") {
                $(".resident").show();
                $(".visitor").hide();
            } else if (category_val == "All") {
                $(".resident").show();
                $(".visitor").show();
            }
        });
    });
    </script>
    <script>
        function ViewDetails(id) {
            var form = $('<form action="appointment-details.php" method="POST">' + '<input type="hidden" name="appointment_id" id="appointment_id" value="'+id+'">' + '</form>');
            //$.post("database-connection/login.php", {'employee_id' : appointment_id, 'password': 'password'}, function(){window.location.href='database-connection/login.php'});
            $('body').append(form);
            form.submit();
        }
    </script>
</head>
<body>
    <!-- Sidebar -->
    <?php require("web-component/sidebar.php"); ?>
        
    <div class="main-container">
        <!-- Header -->
        <div class="header">
            <h1>Sual Municipal Hall Admin Panel</h1>
            <div class="user-info">
                <div class="notification-container">
                    <div class="notificationBtn" id="notificationBtn">
                        <i class="fa-solid fa-bell"></i>
                        <span class="notification-badge" id="notifBadge"></span>
                    </div>
                    <div class="dropdown" id="notificationDropdown">
                        <h3 class="notification-title">Notifications</h3>
                        <ul id="notificationList">
                            <li><strong>New Appointment:</strong> James R. - 10:00 AM</li>
                            <li><strong>Approved Appointment:</strong> Maria S. - 2:00 PM</li>
                            <li><strong>Cancelled Appointment:</strong> John D. - 3:30 PM</li>
                        </ul>
                    </div>
                </div>
                <div class="user-info">
                    <span>James Santos</span>
                    <div class="user-icon"></div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="display">
                <h1>APPOINTMENT LIST</h1>
                <input type="text" placeholder="Search...">
            </div>
            
                <div class="filter-container">
                    <div class="category-filters">
                    <label>Filter by Category:</label>
                    <input type="radio" name="category" value="All" checked> All
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
                    <tr>
                        <td>James R. Manalo</td>
                        <td>Resident</td>
                        <td>Poblacion</td>
                        <td>093333333</td>
                        <td>james@gmail.com</td>
                        <td><button class="view-btn" onclick="window.location.href='resident.html'"> View Details</button></td>
                    </tr>
                    <?php require("database-connection/appoinment-list.php"); ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("notificationBtn").addEventListener("click", function() {
            document.getElementById("notificationDropdown").classList.toggle("show");
            document.getElementById("notifBadge").style.display = 'none'; // Remove badge on click
        });

        window.addEventListener("click", function(event) {
            if (!document.getElementById("notificationBtn").contains(event.target) && 
                !document.getElementById("notificationDropdown").contains(event.target)) {
                document.getElementById("notificationDropdown").classList.remove("show");
            }
        });

        // Show badge if there are notifications
        document.addEventListener("DOMContentLoaded", function() {
            let hasNotifications = document.querySelectorAll("#notificationDropdown ul li").length > 0;
            if (hasNotifications) {
                document.getElementById("notifBadge").style.display = 'block';
            } else {
                document.getElementById("notifBadge").style.display = 'none';
            }
        });
    </script>

</body>
</html>