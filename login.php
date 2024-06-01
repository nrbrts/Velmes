<?php
session_start();

$usernameError = $passwordError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'db.php';

    $username = $_POST["username2"];
    $password = $_POST["password"];

    if(empty($username)){
        $usernameError = "Nepieciešams lietotājvārds";
    }

    if(empty($password)){
        $passwordError = "Nepieciešama parole";
    }

    if(!empty($username) && !empty($password)){
        $result = mysqli_query($conn, "SELECT * FROM items_lietotaji WHERE username2 = '$username'");
        $row = mysqli_fetch_assoc($result);

        if ($result && mysqli_num_rows($result) > 0) {
            // hasho paroles
            if (password_verify($password, $row["password2"])) {
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["username2"] = $row["username2"];
                mysqli_free_result($result);
                mysqli_close($conn);
                header("Location: index.php");
                exit();
            } else {
                $passwordError = "Nepareiza parole!";
            }
        } else {
            $usernameError = "Profils nēksistē!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="star.png">
    <link rel="stylesheet" href="login.css">
    <title>Velmes</title>
</head>
<body>
    <div class="container">
        <div class="login-form">
            <div class="login-input-box">
                <div class="login-input-box-split">
                    <h1 class="login-title">Pieslēdzies</h1>
                </div>
                <span style="opacity: 0.7; color: white;">Lūdzu, pieslēdzieties savam profilam!</span>
                <div class="login-input-box-split-2">
                    <div class="login-input-box-split-2-1">
                        <form action="" method="post">
                            <label style="font-size: 16px; padding-left: 6px;" for="username2">Lietotājvārds:</label><br>
                            <input type="text" id="username2" name="username2" class="login-input" ><br>
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                            <div style="padding-left: 6px; color: red;" id="usernameError" class="error"><?php echo $usernameError; ?></div>
                            <?php endif; ?>

                            <label style="font-size: 16px; padding-left: 6px;" for="password">Parole:</label><br>
                            <input type="password" id="password" name="password" class="login-input" ><br>
                            <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                            <div style="padding-left: 6px; color: red;" id="passwordError" class="error"><?php echo $passwordError; ?></div>
                            <?php endif; ?>

                            <div class="submitdiv"style="text-align: center;"><input type="submit" name="submit" value="Pieslēgties" class="login-button"></div>
                        </form>
                    </div>
                    <div class="login-input-box-split-2-2">
                        <p class="link">Neesi reģistrējies? <a href="register.php">Reģistrācija</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var usernameError = "<?php echo $usernameError; ?>";
        var passwordError = "<?php echo $passwordError; ?>";

        if (usernameError) {
            setTimeout(function() {
                document.getElementById("usernameError").style.display = "none";
            }, 3000);
        }

        if (passwordError) {
            setTimeout(function() {
                document.getElementById("passwordError").style.display = "none";
            }, 3000);
        }
    </script>
</body>
</html>
