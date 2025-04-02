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
            $(".check-id").click(function(){
                $.ajax({
                    url:"../controller/NewPassword.php",
                    method:"POST",
                    data:{check_id:$("input[name='admin-id']").val()},
                    dataType:"json",
                    success:function(data){
                        if (data.check_id == "no") {
                            alert("Employee does not exist! Check your I.D number");
                        } else {
                            var form = $('<form action="setnew-password.php" method="POST">' + '<input type="hidden" name="admin" value="'+$("input[name='admin-id']").val()+'">' + '</form>');
                            //$.post("database-connection/login.php", {'employee_id' : appointment_id, 'password': 'password'}, function(){window.location.href='database-connection/login.php'});
                            $('body').append(form);
                            form.submit();
                        }
                    }
                })
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
    </style>
</head>
<body>
    <div class="container">
        <div class="logo"></div>
        <h2>Forgot Password?</h2>
        <p>Please enter your employee I.D to reset your password</p>
        <input type="text" name="admin-id" placeholder="Enter your Employee I.D." required>
        <button id="special" class="check-id">Submit</button>
    </div>
</body>
</html>