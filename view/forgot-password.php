<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="../css/forgot-password.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".check-id").on("click", function(){
                $.post(
                    "../controller/NewPassword.php",
                    {
                        "check_id":$("input[name='admin-id']").val();
                    }
                )
            })
        })
    </script>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h2>Forgot Password?</h2>
        <p>Please enter your employee I.D to reset your password</p>
        <form action="reset-password.php" method="POST">
            <input type="text" name="admin-id" placeholder="Enter your Employee I.D." required>
            <button id="special" class="check-id">Submit</button>
        </form>
    </div>
</body>
</html>