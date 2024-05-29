<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM items2 WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Vēlme veiksmīgi izdzēsta!";
    } else {
        echo "Kļūda dzēšanas laikā: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
