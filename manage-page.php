<?php
        $conn = new mysqli("localhost", "root", "", "sual_municipal_hall");
        if ($conn->connect_error) {
            die("Connection Failed due to ". $conn->connect_error);
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $appointment_id = $_POST['appointment_id'];
            $query = "SELECT * FROM appointments WHERE id='$appointment_id'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            // $query = $conn->prepare("SELECT * FROM appointments WHERE id=?");
            // $query->bind_param("s", $appointment_id);
            // $query->execute();
            // $result = $query->get_result();
            // $row = $result->fetch_assoc();
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="css/resident-request.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/notifications.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        $(".accept-btn").click(function(){
            $.post(
                "database-connection/status-appointment.php",
                {
                    'id': <?php echo $row['id'] ?>,
                    'status': 'approve'
                }
            );
            alert('Appointment Approved');
        });
        $(".reject-btn").click(function(){
            $.post(
                "database-connection/status-appointment.php",
                {
                    'id': <?php echo $row['id'] ?>,
                    'status': 'decline'
                }
            );
            alert('Appointment Declined');
        });
    })
    </script>
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
            <div class="sign-out"onclick="window.location.href='HFID.html'"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out</div>
        </div>

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
        
            <div class="content-form">
                <div class="form-container">
                    <div class="appointment-type"><?php echo $row['occupant']?></div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" value="<?php echo $row['r_name']?>">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" value="<?php echo $row['date']?>">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" value="<?php echo $row['time']?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" value="<?php echo $row['r_address']?>">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" value="<?php echo $row['r_email']?>">
                    </div>
                    <div class="form-group">
                        <label>Barangay</label>
                        <input type="text" value="<?php echo $row['r_barangay']?>">
                    </div>
                    <div class="form-group">
                        <label>Contact No</label>
                        <input type="text" value="<?php echo $row['r_contact']?>">
                    </div>
                    <div class="form-group">
                        <label>Office</label>
                        <input type="text" value="<?php echo $row['office']?>">
                    </div>
                    <div class="form-group">
                        <label>Purpose Of Visit</label>
                        <input type="text" value="<?php echo $row['purpose']?>">
                    </div>
                    <div class="form-group">
                        <label>Front ID</label>
                        <div class="image-upload">Upload Front ID</div>
                    </div>
                    <div class="form-group">
                        <label>Back ID</label>
                        <div class="image-upload">Upload Back ID</div>
                    </div>
                    <div class="form-group">
                        <label>Selfie</label>
                        <div class="image-upload">Upload Selfie</div>
                    </div>
                    <div class="button-group">
                        <button class="accept-btn">Accept Request</button>
                        <button class="reject-btn">Reject Request</button>
                    </div>
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
    
    