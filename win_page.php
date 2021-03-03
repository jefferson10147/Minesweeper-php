<?php
include("./scores_model.php");

session_start();
if (isset($_SESSION["gameTime"]) && isset($_SESSION["size"]) && isset($_SESSION["username"])) {
    $time = $_SESSION["gameTime"];
    $level = $_SESSION["size"];
    $username = $_SESSION["username"];
}

$scoresModel = new Scores();
$scoresModel->insertScore($username, $time, $level);

$_SESSION["gameTime"] = null;
$scores = $scoresModel->getAllScores();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You win</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <?php
    echo "<h2>Felicitaciones " . $username . " Ha ganado en el nivel " . $level . " in " . $time . " segundos.</h2>";
    ?>

    <h2>
        Mejores Resultados:
    </h2>

    <table>
        <tr>
            <th>Jugador</th>
            <th>Tiempo (s)</th>
            <th>Nivel</th>
        </tr>

        <?php

        foreach ($scores as $score) {
            echo "<tr>";
            echo "<td>" . $score["name"] . "</td>";
            echo "<td>" . $score["time"] . "</td>";
            echo "<td>" . $score["level"] . "</td>";
        }

        ?>
    </table>

    <br>
    <button><a href="./close_session.php">Nueva Partida</a></button>
</body>

</html>