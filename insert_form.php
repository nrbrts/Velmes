<?php
session_start();

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["id"];
    $name = validateInput($_POST["name"]);
    $description = validateInput($_POST["description"]);
    $price = validateInput($_POST["price"]);
    $link = validateInput($_POST["link"]);

    $errors = [];

    if (empty($name)) {
        $errors[] = "Nepieciešams vēlmes nosaukums.";
    }

    if (empty($description)) {
        $errors[] = "Nepieciešams vēlmes apraksts.";
    }

    if (!is_numeric($price) || $price <= 0) {
        $errors[] = "Cena jābūt pozitīvam skaitlim.";
    }

    if (empty($link)) {
        $errors[] = "Nepieciešams vēlmes links.";
    }

    $target_file = "";

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_extension = strtolower(pathinfo($photo['name'], PATHINFO_EXTENSION));
        if (!in_array($file_extension, $allowed_extensions)) {
            $errors[] = "Bildei jābūt JPEG, JPG, vai PNG faila formātā.";
        }

        if (empty($errors)) {
            $target_dir = "uploads/";
            $target_file = $target_dir . uniqid() . '_' . basename($photo["name"]);
            if (move_uploaded_file($photo["tmp_name"], $target_file)) {
                $message = "Fails ". basename($photo["name"]). " veiksmīgi augšupieladēts.";
            } else {
                $errors[] = "Atvaino, kaut kas nogāja greizi.";
            }
        }
    } else {
        $target_file = "soon.jpg";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO items2 (name, description, price, link, user_id, photo) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssdsss", $name, $description, $price, $link, $user_id, $target_file);

        if ($stmt->execute()) {
            $message = "Veiksmīgi pievienoji vēlmi.";
        } else {
            $message = "Error: " . $sql . "<br>" . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }

    echo $message;
}

$conn->close();

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
