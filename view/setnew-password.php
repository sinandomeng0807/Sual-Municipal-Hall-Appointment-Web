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
