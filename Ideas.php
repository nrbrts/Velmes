<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vēlmju idejas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/x-icon" href="star.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php" ?>

    <div class="main" id="main-content">
        Tiks papildināts
    </div>
</body>
</html>
