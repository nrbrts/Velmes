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
    <title>Vēlmju politika</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="star.png">
</head>
<body>
    <?php include "header.php" ?>

    <div class="main" id="main-content">
        <div class="policy-box">
        <p>Šī privātuma politika informē par privātuma praksi un personas datu apstrādes principiem saistībā ar <span style="color: red;">SIA Velmes</span> mājas lapu un pakalpojumiem. Lai sazinātos saistībā ar datu apstrādes jautājumiem, lūdzu rakstiet e-pastu uz <span style="color: red;">velmes@velmes.com</span>.</p>
        <h3>Kādu informāciju mēs iegūstam?</h3>
        <p>Mēs iegūstam tādus personas datus, ko jūs mums brīvprātīgi sniedzat ar e-pasta starpniecību, aizpildot tīmeklī bāzētās anketas un citā tiešā saziņā ar jums. Vietnē ir iespēja izveidot profilu. Izveidojot to jums jānorāda lietotājvārds, ēpasta adrese un cita informācija kuru jūs vēlaties sniegt.</p>
        </div>
    </div>
</body>
</html>
