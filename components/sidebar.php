<script type="text/javascript">
    function confirmSignOut() {
        let confirmAction = confirm("Are you sure you want to sign out?");
        if (confirmAction) {
            window.location.href = '../controller/Logout.php';
        }
    }
</script>
<div class="logo">
    <img src="../Photos/final_logo.png" alt="Logo">
</div>
<ul class="nav">
    <li><a href="dashboard.php"><i class="fa-solid fa-gauge mr-3"></i> Dashboard</a></li>
    <li><a href="appointment-list.php" id="list" class=""><i class="fa-solid fa-list mr-3"></i> Appointment List</a></li>
    <li><a href="manage-appointment.php" id="manage"><i class="fa-solid fa-list-check"></i> Manage Appointment</a></li>
    <li><a href="add-appointment.php" id="add"><i class="fa-solid fa-plus mr-3"></i> Add Appointment</a></li>
</ul>
    <div class="sign-out" onclick="confirmSignOut()">
        <i class="fa-solid fa-arrow-right-from-bracket"></i> Sign Out
    </div>
</div>