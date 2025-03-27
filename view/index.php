<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/HFID.css">

</head>
<body>
       <div class="container">
        <div class="logo"></div>
        <input type="text" id="userid" placeholder="Enter Admin ID">
        <input type="password" id="password" placeholder="Enter Password">
        <div class="actions">
            <button id="special" onclick="window.location.href='dashboard.php'">Login</button>
            <a href="forgot-password.php" class="forgot-password">Forgot Password?</a>
        </div>
    </div>
</body>
</html>
