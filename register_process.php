<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username2 = $_POST["username2"];
    $password2 = $_POST["password2"];
    $confirm_password = $_POST["confirm_password"];
    $email = $_POST["email"];

    if ($password2 == $confirm_password) {
        include('db.php');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // parbauda vai lietotajvards pieejams
        $stmt = $conn->prepare("SELECT COUNT(*) FROM items_lietotaji WHERE username2 = ?");
        $stmt->bind_param("s", $username2);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "Aizņemts lietotājvārds";
        } else {
            // aizpildas forma, ja lietotajs ir pieejams
            $hashed_password = password_hash($password2, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO items_lietotaji (username2, password2, email) VALUES (?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sss", $username2, $hashed_password, $email);
                if ($stmt->execute()) {
                    $_SESSION["username2"] = $username2; 
                    echo "success"; // Send success response
                } else {
                    echo "Kļūda." . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Kļūda! " . $conn->error;
            }
        }

        $conn->close();
    } else {
        echo "Paroles nesakrīt";
    }
}
?>
