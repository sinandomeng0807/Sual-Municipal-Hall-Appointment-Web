<?php require "../controller/Session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor</title>
    <link rel="stylesheet" href="../css/visitor-new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="notifications.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/confirmation_popup.js"></script>
    <script type="text/javascript" src="../scripts/notification.js"></script>
    <script>
    $(document).ready(function(){
        $.ajax({
        url:"../controller/ListDetailController.php",
        method:"POST",
        data:{id:<?php echo $_POST["appointment_id"] ?>},
        dataType:"json",
        success:function(data){
                $(".appointment-type").html(data.occupant);
                $("input[name='name']").val(data.name);
                $("input[name='date']").val(data.date);
                $("input[name='time']").val(data.time);
                $("input[name='address']").val(data.address);
                $("input[name='email']").val(data.email);
                $("input[name='barangay']").val(data.brgy);
                $("input[name='contact']").val(data.contact);
                $("input[name='office']").val(data.office);
                $("input[name='purpose']").val(data.purpose);
                $(".selfie").attr("src", data.selfie);
                $(".front").attr("src", data.front);
                $(".back").attr("src", data.back);
            }
        })
    })
    </script>
</head>
<body>
    <div class="sidebar">
    <?php require "../components/sidebar.php" ?>

    <div class="main-container">
        <div class="header">
            <h1>Sual Municipal Hall Admin Panel</h1>
            <div class="user-info">
                <?php require "../components/dashboard-notification.php"?>
                <div class="user-info">
                    <span>James Santos</span>
                    <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
                </div>
            </div>
        </div>

        <div class="content-form">
            <div class="form-container">
                <div class="button-group">
                    <button class="delete-btn" onclick="deleteAppointment()">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <button class="back-button" onclick="window.location.href='appointment-list.php'">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <div class="appointment-type"></div>
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
                    <label>Email Address</label>
                    <input type="email" name="email">
                </div>
                <div class="form-group">
                    <label>Barangay</label>
                    <input type="text" name="barangay">
                </div>
                <div class="form-group">
                    <label>Contact No</label>
                    <input type="text" name="contact">
                </div>
                <div class="form-group">
                    <label>Office</label>
                    <input type="text" name="office">
                </div>
                <div class="form-group">
                    <label>Purpose Of Visit</label>
                    <input type="text" name="purpose">
                </div>
                <div class="form-group">
                    <label>Front ID</label>
                    <div class="image-upload">
                        <img class="front" style="width: inherit; height: inherit; object-fit: fill;">
                    </div>
                </div>
                <div class="form-group">
                    <label>Back ID</label>
                    <div class="image-upload">
                        <img class="back" style="width: inherit; height: inherit; object-fit: cover;">
                    </div>
                </div>
                <div class="form-group">
                    <label>Selfie</label>
                    <div class="image-upload">
                        <img class="selfie" style="width: inherit; height: inherit; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
