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
    <title>Vēlmes informācija</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="star.png">
</head>
<body>
    <?php include "header.php" ?>

    <div class="main" id="main-content">
        <?php
        if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['description']) && isset($_GET['price']) && isset($_GET['link']) && isset($_GET['photo'])) {
            $id = htmlspecialchars($_GET['id']);
            $name = htmlspecialchars($_GET['name']);
            $description = htmlspecialchars($_GET['description']);
            $price = htmlspecialchars($_GET['price']);
            $link = htmlspecialchars($_GET['link']);
            $photo = htmlspecialchars($_GET['photo']);

            echo "<div class='item-details-box'>";
            echo "<img src='$photo' alt='Item Image'><br>";

            echo "<div class='details'>";
            echo "<div class='half'>";
            echo "<h2>$name</h2>";
            echo "<p>$description</p>";
            echo "</div>";
            echo "<div class='half'>";
            echo "<p>Price: $price</p>";
            echo "</div>";
            echo "</div>";

            echo "<div class='buttons'>";
            echo "<button class='button2' onclick=\"window.location.href='" . $link . "'\">Apmeklēt</button>";
            echo "<button class='button2' onclick='openModal()'>Dzēst</button>";
            echo "<button class='button2' onclick='history.back()'>Atgriezties</button>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Neeksistē.";
        }
        ?>
    </div>

    <div id="deletePopUp" class="modal">
        <div class="modal-content">
            <div class="modal-half">
                <p>Vai tiešām vēlies dzēst?</p>
            </div>
            <div class="modal-half2">
                <button class="delete-button" onclick="deleteItem(<?php echo $id; ?>)">Dzēst</button>
                <button class="cancel-button" onclick="closeModal()">Atcelt</button>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function openModal() {
            var modal = document.getElementById('deletePopUp');
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById('deletePopUp');
            modal.style.display = "none";
        }
        function deleteItem(id) {
            $.ajax({
                type: "POST",
                url: "delete_item.php",
                data: { id: id },
                success: function(response) {
                    alert(response);
                    window.location.href = "index.php"; 
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
        }
    </script>
</body>
</html>
