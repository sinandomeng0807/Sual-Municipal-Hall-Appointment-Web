<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>set new password</title>
    <link rel="stylesheet" href="../css/setnew-password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <?php echo "<input type='hidden' name='change' value='".$_POST['admin']."'>" ?>
    <script>
        $(document).ready(function(){
            $(".submit-password").click(function(){
                if ($("input[name='password']").val() != $("input[name='confirm-password']").val()) {
                    alert("Password Does Not Match!");
                }
                if ($("input[name='password']").val().length < 8){
                    alert("Invalid password must have 8 strings!");
                } else {
                    $.post(
                        "../controller/NewPassword.php",
                        {
                            'change_pass': $("input[name='change']").val(),
                            'password': $("input[name='password']").val()
                        }
                    );
                    alert("Password Has Been Changed! Redirecting you to login page...");
                    window.open("index.php", "_self");
                }
            })
        })
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('../Photos/bg.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            text-align: center;
        }

        .logo {
            width: 150px;
            height: 150px;
            background-image: url('../Photos/logo.png');
            background-size: 200px;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 30px;
            font-size: 36px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h2>Set a new password</h2>
        <p>Create a new password. Ensure it differs <br/> from the previous one for security </p>
        <input type="password" id="password" name="password" placeholder="Enter New Password">
        <input type="password" id="password" name="confirm-password"placeholder="Confirm Password">
        <button id="special" class="submit-password">Submit</button>
        </div>
    </div>
</body>
</html>
