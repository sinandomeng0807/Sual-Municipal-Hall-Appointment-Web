<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/HFID.css">
    <style>
        .forgot{
            
            font-size: smaller;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $("#special").click(function(){
                $.post(
                    "controller/Login.php",
                    {
                        username:$("input[name='username']").val(),
                        password:$("input[name='password'").val()
                    },
                    function(data){
                        if (data.error) {
                            alert(data.error);
                        } else {
                            window.location.href = data.location;
                        }
                    }, 
                    "json"
                )
            })
        });
    </script>
</head>
<body>
       <div class="container">
        <div class="logo"></div>
        <h3>Sual Municipall Hall Admin</h3>
        <input type="text" id="userid" name="username" placeholder="Enter Admin ID">
        <input type="password" id="password" name="password" placeholder="Enter Password">
        <div class="actions">
        <a href="view/forgot-password.php" class="forgot-password"><p class="forgot">Forgot Password?</p></a>
        </div>
        <button id="special">Login</button> 
        
    </div>
</body>
</html>
