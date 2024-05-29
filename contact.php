<?php
session_start();
if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO items_contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Izdevās";
    } else {
        echo "Kļūda";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vēlmju atbalsts</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="star.png">
</head>
<body>
<?php include "header.php" ?>

<div class="main" id="main-content">
    <div class="contact-box">
        <form method="post" class="contactForm" id="insertForm">
            <div class="contactform-box-top">
                    <h2 style="font-size: 24px;">Atbalsta centrs<h2>
            </div>
            <div class="contactform-box-mid">
                <label for="name">Lietotājvārds:</label>
                <input  class="form-field input-fields" type="text" id="name" name="name">
                <label for="email">Ēpasts:</label>
                <input  class="form-field input-fields" type="email" id="email" name="email">
                <label for="message">Ziņojums:</label>
                <textarea class="form-field-textarea-input-fields" style="resize: none;" id="message" name="message"></textarea>
                <input type="submit" value="Submit" class="button">
                <div id="formMessage"></div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#insertForm").on("submit", function(e) {
            e.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var message = $("#message").val();

            $(".error").remove();

            var valid = true;

            if (name.length < 1) {
                $('#name').after('<span class="error" style="color: red;">Nepieciešams aizpildīt!</span>');
                valid = false;
            }
            if (email.length < 1) {
                $('#email').after('<span class="error" style="color: red;">Nepieciešams aizpildīt!</span>');
                valid = false;
            }
            if (message.length < 1) {
                $('#message').after('<span class="error" style="color: red;">Nepieciešams aizpildīt!</span>');
                valid = false;
            }

            if (valid) {
                $.ajax({
                    type: "POST",
                    url: "contact.php",
                    data: $("#insertForm").serialize(),
                    success: function(response) {
                        if (response == "success") {
                            $('#formMessage').html('<span style="color: red;">Kaut kas nesanāca. Mēģini vēlreiz!</span>');
                        } else {
                            $('#formMessage').html('<span style="color: green;">Tev izdevās!</span>');
                        }
                    }
                });

                $("#name, #email, #message").val('');
            }
            setTimeout(function() {
                $(".error").remove();
            }, 3000);
        });
    });
</script>
</body>
</html>
