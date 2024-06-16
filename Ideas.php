<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if (isset($_POST['getRandomItem'])) {
    $sql = "SELECT * FROM items2 ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $randomItem = $result->fetch_assoc();
        echo json_encode($randomItem);
        exit();
    } else {
        echo json_encode(['error' => 'Nav ideju']);
        exit();
    }
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
        <div class="ideju-kaste">
            <h2 style="text-align: center;"></h2>
            <form style="text-align: center;" id="randomItemForm">
                <button type="button" id="getRandomItem" class="random-poga">Nejauša vēlme?</button>
            </form>
            <div class="styled-box" id="random-item-box">
                <p style="font-size: 20px; margin-top: 10px;"><strong>Nosaukums: </strong><span id="item-name"></span></p>
                <p style="font-size: 20px; margin-top: 10px;"><strong>Cena: </strong><span id="item-price"></span></p>
                <p><strong></strong> <img id="item-photo" src="" alt="nejausas velmes bilde"></p>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#getRandomItem').on('click', function() {
                $.ajax({
                    type: 'POST',
                    url: '',
                    data: { getRandomItem: true },
                    dataType: 'json',
                    success: function(response) {
                        if (response.error) {
                            alert(response.error);
                        } else {
                            $('#item-name').text(response.name);
                            $('#item-price').text(response.price);
                            $('#item-photo').attr('src', response.photo);
                            $('#random-item-box').show();
                        }
                    },
                    error: function() {
                        alert('Error retrieving item');
                    }
                });
            });
        });
    </script>
</body>
</html>
