<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION["id"];
$username2 = $_SESSION["username2"];
?>


<div id="content-container">
    <div class="all">
        <div class="header">
            <div class="header-top">
                <p class="velmes-title" style="font-size:60px; color:papayawhip; font-family: 'Dancing Script';">Vēlmes</p>
            </div>
            <div class="header-bottom">
                <div class="header-bottom-top">
                    <a href="index.php" class="redirect"><?php echo $username2 . "'s Vēlmes"; ?></a>
                    <a href="Ideas.php" class="redirect">Idejas vēlmēm</a>
                    <a href="settings.php" class="redirect">Iestatījumi</a>
                    <a href="insert.php" class="redirect">Vēlmes pievienošana</a>
                </div>
                <div class="header-bottom-bottom">
                    <a href="logout.php" class="redirect">Iziet</a>
                    <a href="contact.php" class="redirect">Sazināties</a>
                    <a href="policy.php" class="redirect">Privātuma politika</a>
                </div>
            </div>

            <button class="dropdown-button">☰</button>

            <div class="header-dropdown">
                <a href="index.php" class="redirect"><?php echo $username2; ?> Vēlmes</a>
                <a href="Ideas.php" class="redirect">Idejas</a>
                <a href="settings.php" class="redirect">Iestatījumi</a>
                <a href="insert.php" class="redirect">Pievienot</a>
                <a href="logout.php" class="redirect">Iziet</a>
                <a href="contact.php" class="redirect">Sazināties</a>
                <a href="policy.php" class="redirect">Privātuma politika</a>
            </div>
        </div>
    </div>
</div>
