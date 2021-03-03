<?php
session_start(); 

if (isset($_SESSION["gameTime"]) && isset($_SESSION["size"])) {
    $time = $_SESSION["gameTime"];
    $level = $_SESSION["size"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You win</title>
</head>

<body>
    <?php

    echo "<h2>Felicitaciones " . $_SESSION["username"] . " Ha ganado en el nivel " . $level . " in " . $time . " seconds.";

    ?>
    <button><a href="./close_session.php">Nueva Partida</a></button>
</body>

</html>