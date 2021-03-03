<?php
if (isset($_GET["time"]) && isset($_GET["size"])) {
    $time = $_GET["time"];
    $levell = $_GET["size"];
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
    <button><a href="./close_session.php">Nueva Partida</a></button>
</body>

</html>