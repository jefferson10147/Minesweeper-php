<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
</head>

<body>

    <form action="start_game.php" method="get">
        <label>Nombre del jugador: </label><input type="text" name="username" required>
        <br>
        <label>Nivel [8:20]</label>
        <input type="number" min="8" max="20" name="size" required>
        <br>
        <button type="submit" value="send">ok</button>
    </form>

</body>

</html>