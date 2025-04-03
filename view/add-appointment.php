<?php require "../controller/Session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment List</title>
    <link rel="stylesheet" href="../css/add-appointment.css">
    <link rel="stylesheet" href="../css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/notification.js"></script>
    <script type="text/javascript" src="../scripts/sidebar_highlight.js"></script> 
    <script>
        $(document).ready(function(){
            $("input[name='zip_code']").on("change", function(){
                zip_code = $("input[name='zip_code']").val();
                if (zip_code.length < 4){
                    alert("zip code must be 4 in length");
                }
                if (isNaN(zip_code)) {
                    alert("zip code must be a valid number");
                }
            });
            $("input[name='contact']").on("change", function(){
                contact = $("input[name='contact']").val();
                if (contact.length < 11){
                    alert("contact number must be 11 digits");
                }
                if (isNaN(contact)){
                    alert("contact number must only be a number");
                }
                if (!contact.startsWith("09")){
                    alert("contact number must starts with 09")
                }
            })
        })
    </script>
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
        <?php require "../components/sidebar.php" ?>
    </div>

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
                <h1>ADD APPOINTMENT</h1>
                <input type="text" placeholder="Search...">
            </div>

            <form action="../controller/AddAppointment.php" method="POST" enctype=multipart/form-data>
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
                            <input type="file" accept="image/*" name="frontPhoto" id="front-input" onchange="previewImage(event, 'front')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Back ID</label>
                        <div class="image-upload">
                            <span>Upload Back ID</span>
                            <img id="back-preview">
                            <input type="file" accept="image/*" name="backPhoto" id="back-input"  onchange="previewImage(event, 'back')">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Selfie</label>
                        <div class="image-upload">
                            <span>Upload Selfie</span>
                            <img id="selfie-preview">
                            <input type="file" accept="image/*" name="selfiePhoto" id="selfie-input" onchange="previewImage(event, 'selfie')">
                        </div>
                    </div>
                    <input type="submit" class="submit-btn" value="Submit Appointment">
                </div> 
                </form>        
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
    