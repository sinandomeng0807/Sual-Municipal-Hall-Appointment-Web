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
            <button class="mt-auto mb-0 bg-gray-700 p-3 rounded-2xl w-full"> <i class="fa-solid fa-arrow-right-from-bracket"></i> <a href="HFID.html"> Sign Out</a></button>
        </aside> 

        <div class="flex flex-col flex-1">
            <!-- Header -->
            <header class="bg-red-800 text-white p-2.5 flex justify-between items-center w-full relative">
                <h1 class="text-lg font-bold">Sual Municipal Hall Admin Panel</h1>
                <div class="flex items-center gap-5">
                    <div class="notification-container">
                        <button id="notificationBtn" class="relative">
                            <i class="fa-solid fa-bell text-xl"></i>
                            <span id="notifBadge" class="notification-badge"></span>
                        </button>
                        <div id="notificationDropdown" class="dropdown">
                            <div class="notification-title">Notifications</div>
                            <ul>
                                <li><b>New Appointment:</b> <span>James R. - 10:00 AM</span></li>
                                <li><b>Approved Appointment:</b> <span>Maria S. - 2:00 PM</span></li>
                                <li><b>Cancelled Appointment:</b> <span>John D. - 3:30 PM</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="user-info">
                        <span>James Santos</span>
                        <div class="w-6 h-6 bg-white rounded-full"></div>
                    </div>
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
                        <p class="text-2xl font-bold">449</p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold text-green-600">NUMBER OF APPROVED APPOINTMENTS</p>
                        <p class="text-2xl font-bold">100</p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold text-orange-600">NUMBER OF PENDING APPOINTMENTS</p>
                        <p class="text-2xl font-bold">125</p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center border-2 border-500">
                        <p class="text-sm font-bold text-red-600">NUMBER OF REJECTED APPOINTMENTS</p>
                        <p class="text-2xl font-bold">15</p>
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
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 text-left">Manalo, James R</td>
                        <td class="p-2 text-left">Resident</td>
                        <td class="p-2 text-left">Appointment</td>
                        <td class="p-2 text-left">Date</td>
                        <td class="p-2 text-left">Time</td>
                    </tr>
                </tbody>
            </table>
        </main>
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
