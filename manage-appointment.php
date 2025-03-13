<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="css/manage-appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/notifications.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    </script>
    <script>
    $(document).ready(function(){
        $("input[type=radio][name=category]").change(function(){
            var category_val = $("input[type=radio][name=category]:checked").val();
            if (category_val == "Approve") {
                $(".pending").hide();
                $(".decline").hide();
                $(".approve").show();
            } else if (category_val == "Pending") {
                $(".pending").show();
                $(".decline").hide();
                $(".approve").hide();
            } else if (category_val == "Decline") {
                $(".pending").hide();
                $(".decline").show();
                $(".approve").hide();
            } else if (category_val == "All") {
                $(".pending").show();
                $(".decline").show();
                $(".approve").show();
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
                            <th>Residents</th>
                            <th>Barangay</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php require("database-connection/manage-list.php"); ?>
                    </tbody>
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
