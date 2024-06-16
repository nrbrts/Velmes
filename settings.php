<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

require 'db.php'; 

if (!isset($_SESSION['id'])) {
    die("Neesi pievienojies.");
}

$userId = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['username2'];
    $newPassword = $_POST['password2'];

    // Validate password
    if (strlen($newPassword) < 8 || !preg_match('/[a-zA-Z]/', $newPassword) || !preg_match('/\d/', $newPassword)) {
        http_response_code(400);
        echo "Parolei jābūt vismaz 8 simboliem garai un saturēt vismaz vienu burtu, un vienu ciparu!";
        exit();
    }
    
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    
    $sql = "UPDATE items_lietotaji SET username2 = ?, password2 = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $newUsername, $hashedPassword, $userId);
        
        if ($stmt->execute()) {
            echo "Iestatījumi atjaunināti veiksmīgi!";
        } else {
            http_response_code(500);
            echo "Notika kļūda: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        http_response_code(500);
        echo "Kaut kas nogāja greizi: " . $conn->error;
    }
    
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vēlmes iestatījumi</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="star.png">
</head>
<body>
    <?php include "header.php"; ?>
    
    <div class="main" id="main-content">
        <div class="box5-container">
            <div class="box5-form">
                <div class="box5-input-box">
                    <h1 class="box5-title">Iestatījumi</h1>
                    <span style="opacity: 0.7; color: white;">Ja vēlies saglabāt lietotājvārdu, tad ievadi to pašu kāds ir.</span>
                    <form style="margin-top: 30px;" id="settingsForm">
                        <label for="username2" class="box5-label">Jauns lietotājvārds:</label><br>
                        <input type="text" id="username2" name="username2" class="box5-input">
                        <br>
                        <label for="password2" class="box5-label">Jauna parole:</label><br>
                        <input type="password" id="password2" name="password2" class="box5-input">
                        <br>
                        <div class="box5-submitdiv"><input type="submit" value="Atjaunināt" class="box5-button"></div>
                    </form>
                    <div id="message" class="box5-message"></div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    $(document).ready(function() {
        $('#settingsForm').on('submit', function(e) {
            e.preventDefault();

            var username = $('#username2').val();
            var password = $('#password2').val();

            if (username.trim() === '' || password.trim() === '') {
                $('#message').html('<p style="color: red;">Lūdzu, aizpildiet abus ievadlaukus.</p>');
                setTimeout(function() {
                    $('#message').html('');
                }, 3000);
                return; 
            }

            if (password.length < 8 || !/[a-zA-Z]/.test(password) || !/\d/.test(password)) {
                $('#message').html('<p style="color: red; width: 200px;">Parolei jābūt vismaz 8 simboliem garai un saturēt vismaz vienu burtu, un vienu ciparu!</p>');
                setTimeout(function() {
                    $('#message').html('');
                }, 3000);
                return;
            }

            $.ajax({
                url: 'settings.php',
                type: 'POST',
                data: {
                    username2: username,
                    password2: password
                },
                success: function(response) {
                    $('#message').html('<p>' + response + '</p>');
                    setTimeout(function() {
                        $('#message').html('');
                    }, 3000);
                    $('#settingsForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    $('#message').html('<p style="color: red;">' + errorMessage + '</p>');
                    setTimeout(function() {
                        $('#message').html('');
                    }, 3000);
                }
            });
        });
    });
</script>

</body>
</html>
