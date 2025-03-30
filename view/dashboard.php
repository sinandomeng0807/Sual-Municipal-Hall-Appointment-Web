<?php require "../controller/Session.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../scripts/notification.js"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"../controller/DashboardController.php",
                method:"POST",
                data:{},
                dataType:"json",
                success:function(data){
                    $(".all").html(data.all);
                    $(".approved").html(data.approve);
                    $(".pending").html(data.pending);
                    $(".declined").html(data.decline);
                }
            })
        })
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <?php require "../components/dashboard-sidebar.php" ?>
        <div class="flex flex-col flex-1">
            <!-- Header -->
            <header class="bg-red-800 text-white p-2.5 flex justify-between items-center w-full relative">
                <h1 class="text-lg font-bold">Sual Municipal Hall Admin Panel</h1>
                <div class="flex items-center gap-5">
                    <?php require "../components/dashboard-notification.php"?>
                    <div class="user-info">
                        <span>James Santos</span>
                        <div class="user-icon"><i class="fa-solid fa-circle-user"></i></div>
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
                        <p class="text-2xl font-bold all">0</p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold text-green-600">NUMBER OF APPROVED APPOINTMENTS</p>
                        <p class="text-2xl font-bold approved">0</p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center">
                        <p class="text-sm font-bold text-orange-600">NUMBER OF PENDING APPOINTMENTS</p>
                        <p class="text-2xl font-bold pending">0</p>
                    </div>
                    <div class="bg-white p-5 rounded shadow text-center border-2 border-500">
                        <p class="text-sm font-bold text-red-600">NUMBER OF DECLINED APPOINTMENTS</p>
                        <p class="text-2xl font-bold declined">0</p>
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
        const ctx = document.getElementById('appointmentsChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'Appointments',
                    data: [1, 2, 3, 4, 5, 6, 7],
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
                        suggestedMax: 50
                    }
                }
            }
        });
    </script>
</body>
</html>
