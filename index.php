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
    <title>Vēlmju saraksts</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" type="image/x-icon" href="star.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "header.php" ?>

<div class="main" id="main-content">
    <?php
    include "db.php";
    $user_id = $_SESSION["id"];

    $sql = "SELECT id, name, description, price, link, photo FROM items2 WHERE user_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            echo "<p style='color: white; font-size: 24px; padding-top: 2%;'>Nav vēlmes? Pievieno! </p>";
        } else {
            $stmt->bind_result($id, $name, $description, $price, $link, $photo);

            while ($stmt->fetch()) {
                echo "<div class='boxes'>";
                echo "<div class='box'>";
                echo '<img src="'.$photo.'" alt="Image" width="240px" height="200px" style="object-fit: cover;">';
                echo "</div><br>";
                echo "<div class='box2'>";
                echo "<div class='box-half'>";
                echo "Name: " . $name . "<br>";
                echo "</div><br>";
                echo "<div class='box-half2'>";
                echo "Price: " . $price . "<br>";
                echo "</div><br>";
                echo "</div><br>";
                echo "<div class='box3'>";
                $params = http_build_query([
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'link' => $link,
                    'photo' => $photo
                ]);
                echo "<button class='button2' onclick=\"window.location.href='item_details.php?$params'\">Aplūkot</button>";
                echo "<button class='button2' onclick='openModal($id)'>Dzēst</button>";
                echo "</div><br>";
                echo "</div><br>";
            }
        }
        $stmt->close();
    } else {
        echo "Kļūda. " . $conn->error;
    }

    $conn->close();
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
    <script>
        var deleteItemId;

        function openModal(id) {
            deleteItemId = id;
            var modal = document.getElementById('deletePopUp');
            modal.style.display = "block";
        }

        function closeModal() {
            var modal = document.getElementById('deletePopUp');
            modal.style.display = "none";
        }

        function deleteItem() {
            $.ajax({
                type: "POST",
                url: "delete_item.php",
                data: { id: deleteItemId },
                success: function(response) {
                    showAlert(response);
                    location.reload();
                },
                error: function(error) {
                    console.log("Error:", error);
                }
            });
            closeModal();
        }

        function showAlert(message) {
            var alertContainer = $("<div>").html(message);
            alertContainer.find("p").css("color", "red");
            alertContainer.appendTo(".insert-box");
            setTimeout(function() {
                alertContainer.remove();
            }, 5000);
        }
    </script>
</body>
</html>
