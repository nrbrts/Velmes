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
    <title>Vēlmes pievienošana</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/x-icon" href="star.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "header.php" ?>

    <div class="main" id="main-content">
        <div class="insert-box">
            <form id="insertForm" enctype="multipart/form-data">
                <h2 style="padding-bottom: 16px;">Pievieno vēlmi sarakstam!</h2>
                <div class="split">
                    <div class="input-box">
                        <label for="name">Nosaukums:</label>
                        <input id="name" class="input-fields" type="text" name="name" required>

                        <label for="price">Cena:</label>
                        <input id="price" class="input-fields" type="number" name="price" step="0.01" min="0.01" max="100000" required>

                        <label for="description">Apraksts:</label>
                        <textarea id="description" class="input-fields" name="description" minlength="2" style="resize: none; height: 70px;" required></textarea>
                    </div>

                    <div class="input-box">
                        <label for="link">Vietne:</label>
                        <input id="link" class="input-fields" type="text" name="link" required>

                        <label style="text-align: center;" for="photo">Bilde:</label>
                        <input id="photo" class="input-fields" style="color: black" type="file" name="photo" accept=".jpg, .jpeg, .png" required>
                    </div>
                </div>

                <div class="split2">
                    <input class="button" type="button" value="Pievienot!" onclick="addItem()">
                </div>
            </form>
        </div>
    </div>

    <script>
    function addItem() {
        var formData = new FormData($("#insertForm")[0]);

        if(!validateForm()) {
            return;
        }

        $.ajax({
            type: "POST",
            url: "insert_form.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                clearInputFields();
                showSuccess('Pievienots vēlmju sarakstam!');
            },
            error: function(error) {
                console.log("Error:", error);
            }
        });
    }

    function validateForm() {
        var isValid = true;
        $('.input-fields').each(function() {
            if ($(this).val() === '') {
                showError($(this).attr('id'), 'Nepieciešams aizpildīt!');
                isValid = false;
            }
        });
        return isValid;
    }

    function clearInputFields() {
        $(".input-fields").val("");
        $("#photo").val(null);
    }

    function showError(inputId, message) {
        $("#" + inputId).next("div").remove();

        var errorElement = $("<div>").html(message).css("color", "red");
        errorElement.insertAfter("#" + inputId);
        setTimeout(function() {
            errorElement.remove();
        }, 3000);
    }

    function showSuccess(message) {
        var successElement = $("<div>").html(message).css("color", "#66ff00");
        successElement.insertAfter(".button");
        setTimeout(function() {
            successElement.remove();
        }, 3000);
    }
    </script>
</body>
</html>
