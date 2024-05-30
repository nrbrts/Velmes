<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="star.png">
    <title>Vēlmes reģistrācija</title>
</head>
<body>
<div class="container">
    <div class="form">
        <div class="login-input-box-split-2">
            <h1 class="login-title">Reģistrācija</h1>
            <div class="login-input-box-split-2-1">
                <span style="opacity: 0.7; color: white; max-width: 60%; text-align: center;">Lai pievienotu savu vēlmi vēlmju sarakstam nepieciešams izveidot profilu</span>
                <form id="registerForm" style="margin-top: 20px;" action="register_process.php" method="post">
                    <label style="font-size: 16px; padding-left: 6px;" for="username">Lietotājvārds:</label><br>
                    <input type="text" id="username2" name="username2" class="login-input"><br>
                    <div style="padding-left: 6px; color: red;" id="usernameError" class="error"></div>

                    <label style="font-size: 16px; padding-left: 6px;" for="email">E-pasts:</label><br>
                    <input type="text" id="email" name="email" class="login-input"><br>
                    <div style="padding-left: 6px; width: 200px; color: red;" id="emailError" class="error"></div>

                    <label style="font-size: 16px; padding-left: 6px;" for="password">Parole:</label><br>
                    <input type="password" id="password2" name="password2" class="login-input"><br>
                    <div style="padding-left: 6px; color: red; word-break: normal; width: 240px;" id="passwordError" class="error"></div>

                    <label style="font-size: 16px; padding-left: 6px;" for="confirm_password">Apstiprini paroli:</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" class="login-input"><br>
                    <div style="padding-left: 6px; color: red;" id="confirmPasswordError" class="error"></div>
                    <div class="registracijasdiv"><input type="submit" value="Izveidot!" class="register-button"></div>
                    <p style="margin-top: 20px;" class="link">Vai Tev jau ir profils? <a href="login.php">Pieslēdzies te!</a></p>
                </form>
            </div>
            <div class="login-input-box-split-2-2">
                <!-- <p class="link">Vai Tev jau ir profils? <a href="login.php">Pieslēdzies te!</a></p> -->
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        var username = document.getElementById('username2').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password2').value;
        var confirmPassword = document.getElementById('confirm_password').value;

        if (!username) {
            document.getElementById('usernameError').innerText = 'Nepieciešams lietotājvārds!';
            document.getElementById('usernameError').style.display = 'block';
            event.preventDefault();
            setTimeout(function() {
                document.getElementById('usernameError').style.display = 'none';
            }, 3000);
            return;
        }

        if (!email) {
            document.getElementById('emailError').innerText = 'Nepieciešams e-pasts';
            document.getElementById('emailError').style.display = 'block';
            event.preventDefault();
            setTimeout(function() {
                document.getElementById('emailError').style.display = 'none';
            }, 3000);
            return;
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById('emailError').innerText = 'Nepareizs e-pasta formāts';
            document.getElementById('emailError').style.display = 'block';
            event.preventDefault();
            setTimeout(function() {
                document.getElementById('emailError').style.display = 'none';
            }, 3000);
            return;
        }

        if (!password) {
            document.getElementById('passwordError').innerText = 'Nepieciešama droša parole!';
            document.getElementById('passwordError').style.display = 'block';
            event.preventDefault();
            setTimeout(function() {
                document.getElementById('passwordError').style.display = 'none';
            }, 3000);
            return;
        }

        if (password.length < 8 || !/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
            document.getElementById('passwordError').innerText = 'Parolei jābūt vismaz 8 simboliem garai un saturēt vismaz vienu burtu, un vienu ciparu!';
            document.getElementById('passwordError').style.display = 'block';
            event.preventDefault();
            setTimeout(function() {
                document.getElementById('passwordError').style.display = 'none';
            }, 3000);
            return;
        }

        if (password !== confirmPassword) {
            document.getElementById('confirmPasswordError').innerText = 'Paroles nesakrīt';
            document.getElementById('confirmPasswordError').style.display = 'block';
            event.preventDefault();
            setTimeout(function() {
                document.getElementById('confirmPasswordError').style.display = 'none';
            }, 3000);
            return;
        }
    });
</script>
</body>
</html>
