<?php
session_start();
if (!isset($_SESSION['employee_id'])) {
    header("Location: index.html");
    exit();
}
require("database-connection/appointment-status.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-60 bg-red-900 text-white p-5 h-full flex flex-col items-center">
            <img src="Photos/logo.png" alt="Logo" class="w-21 h-21 mb-5"> <!-- Adjust logo as needed -->
            <nav class="custom-nav">
                <ul class="w-full">
                    <li class="flex items-center p-3 bg-red-700 rounded-2xl my-2 border-2 border-white">
                        <i class="fa-solid fa-gauge mr-3"></i> <a href="#">Dashboard</a>
                    </li>
                    <li class="flex items-center p-3 hover:bg-red-700 rounded-2xl my-2 border-2 border-white">
                        <i class="fa-solid fa-list mr-3"></i> <a href="appointment-list.php">Appointment List</a>
                    </li>
                    <li class="flex items-center p-3 hover:bg-red-700 rounded-2xl my-2 border-2 border-white">
                        <i class="fa-solid fa-chart-simple mr-3"></i> <a href="manage-appointment.php">Manage Appointment</a>
                    </li>
                    <li class="flex items-center p-3 hover:bg-red-700 rounded-2xl my-2 border-2 border-white">
                        <i class="fa-solid fa-plus mr-3"></i> <a href="add-appointment.php">Add Appointment</a>
                    </li>
                </ul>
            </nav>
            <button class="mt-auto mb-0 bg-gray-700 p-3 rounded-2xl w-full"> <i class="fa-solid fa-arrow-right-from-bracket"></i> <a href="database-connection/logout.php"> Sign Out</a></button>
        </aside> 

        <div class="flex flex-col flex-1">
            <!-- Header -->
            <header class="bg-red-800 text-white p-3 flex justify-between items-center w-full">
                <h1 class="text-lg font-bold">Sual Municipal Hall Admin Panel</h1>
                <div class="flex items-center">
                    <span class="mr-2"><?php echo $_SESSION['employee_id']; ?></span>
                    <div class="w-6 h-6 bg-white rounded-full"></div>
                </div>
            </header>
        
        <!-- Main Content -->
        <main class="flex-1 p-5 overflow-y-auto">
            <h1 class="text-2xl font-bold">DASHBOARD</h1>
            <div class="grid grid-cols-2 gap-4 mt-5">
                <div class="bg-white p-5 rounded shadow flex justify-center">
                    <canvas id="appointmentsChart" width="500" height="250"></canvas>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold">NUMBER OF APPOINTMENTS</p>
                        <p class="text-2xl font-bold"><?php echo $num_appointment->num_rows; ?></p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold text-green-600">NUMBER OF APPROVED APPOINTMENTS</p>
                        <p class="text-2xl font-bold"><?php echo $num_approved->num_rows; ?></p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold text-orange-600">NUMBER OF PENDING APPOINTMENTS</p>
                        <p class="text-2xl font-bold"><?php echo $num_pending->num_rows; ?></p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center border-2 border-500">
                        <p class="text-sm font-bold text-red-600">NUMBER OF REJECTED APPOINTMENTS</p>
                        <p class="text-2xl font-bold"><?php echo $num_rejected->num_rows; ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Appointments Table -->
            <h2 class="text-xl font-bold mt-5">Today's Appointment</h2>
            <table class="w-full bg-white shadow mt-2">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="p-2 text-left">Name</th>
                        <th class="p-2 text-left">Residents</th>
                        <th class="p-2 text-left">Type</th>
                        <th class="p-2 text-left">Date</th>
                        <th class="p-2 text-left">Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('database-connection/today-appointment.php');
                    ?>
                </tbody>
            </table>
        </main>
    </div>
    
    <script>
        const ctx = document.getElementById('appointmentsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Appointments',
                    data: [120, 500, 10, 5, 8, 12, 4],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 600
                    }
                }
            }
        });
    </script>
</body>
</html>
