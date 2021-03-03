<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        .center {
            margin: auto;
            width: 50%;
            border: 10px;
            border-style: solid;
            border-color: #000203;
            text-align: center;
            padding: 10px;
            background-color: darkgrey;
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>

<body style="background-color:aliceblue">
    <p align="center">
        <img src="./assets/img/title.png" width="20%" height="20%">
    </p>

    <div class="center">
        <form action="start_game.php" method="get">
            <label>Nombre del jugador: </label><input type="text" name="username" required>
            <br><br>
            <label>Nivel [8-20]</label>
            <input type="number" min="8" max="20" name="size" required>
            <br><br>
            <button type="submit" value="send">ok</button>
        </form>
    </div>


</body>

</html>