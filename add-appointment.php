<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="css/add-appointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/notifications.css">
    
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
                <h1>ADD APPOINTMENT</h1>
                <input type="text" placeholder="Search...">
            </div>

            <div class="content-form">
                <form action="database-connection/add-appoint.php" method="POST">
                <div class="form-container">
                    <div class="form-group">
                        <select name="occupant">
                            <option value="Visitor">Visitor</option>
                            <option value="Resident">Resident</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="name">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date">
                    </div>
                    <div class="form-group">
                        <label>Time</label>
                        <input type="time" name="time">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address">
                    </div>
                    <div class="form-group">
                        <label>Office</label>
                        <input type="text" name="office">
                    </div>
                    <div class="form-group">
                        <label>Barangay</label>
                        <input type="text" name="barangay">
                    </div>
                    <div class="form-group">
                        <label>Zip Code</label>
                        <input type="text" name="zip_code">
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <input type="text" name="province">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" name="contact">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label>Purpose</label>
                        <input type="text" name="purpose">
                    </div>
            
                    <!-- Image Upload Fields -->
                    <div class="form-group">
                        <label>Front ID</label>
                        <div class="image-upload">
                            <span>Upload Front ID</span>
                            <img id="front-preview">
                            <input type="file" accept="image/*" id="front-input" onchange="previewImage(event, 'front')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Back ID</label>
                        <div class="image-upload">
                            <span>Upload Back ID</span>
                            <img id="back-preview">
                            <input type="file" accept="image/*" id="back-input" onchange="previewImage(event, 'back')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Selfie</label>
                        <div class="image-upload">
                            <span>Upload Selfie</span>
                            <img id="selfie-preview">
                            <input type="file" accept="image/*" id="selfie-input" onchange="previewImage(event, 'selfie')">
                        </div>
                    </div>
                    <input type="submit" class="submit-btn" value="Submit Appointment">
                </div> 
                </form>   
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
            
            <script>
                function previewImage(event, id) {
                    const input = event.target;
                    const preview = document.getElementById(id + "-preview");
                    const box = input.parentElement;
                    
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                            box.classList.add("has-image");
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
        
    </body>
    </html>
    