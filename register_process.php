<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username2 = $_POST["username2"];
    $password2 = $_POST["password2"];
    $confirm_password = $_POST["confirm_password"];

    if ($password2 == $confirm_password) {
        include('db.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $hashed_password = password_hash($password2, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO items_lietotaji (username2, password2, email) VALUES (?, ?, ?)");

        if ($stmt) {
            $email = $_POST["email"];

            $stmt->bind_param("sss", $username2, $hashed_password, $email);

            if ($stmt->execute()) {
                $_SESSION["username2"] = $username2; // Set the session variable here
                header("Location: login.php");
                exit();
            } else {
                echo "Kļūda." . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Kļūda! " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Paroles nesakrīt";
    }
}
?>
