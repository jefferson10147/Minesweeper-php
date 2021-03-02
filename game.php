<?php
// funcion recursiva del buscaminas
function checkForMines($row, $col, $map, &$auxMap)
{
    if ($auxMap[$row][$col]) {
        return;
    }

    if ($row < 0 || $row >= $_SESSION["size"]) {
        return;
    }

    if ($col < 0 || $col >= $_SESSION["size"]) {
        return;
    }

    if ($map[$row][$col] == '*') {
        $auxMap[$row][$col] = false;
        return;
    }

    $auxMap[$row][$col] = true;
    checkForMines($row - 1, $col, $map, $auxMap);
    checkForMines($row + 1, $col, $map, $auxMap);
    checkForMines($row, $col - 1, $map, $auxMap);
    checkForMines($row, $col + 1, $map, $auxMap);
}

// iniciando variables 
session_start();

$size = $_SESSION["size"];
$minesNumber = $_SESSION["minesNumber"];
$map = $_SESSION["matrixMap"];


if (!isset($_GET)){
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $auxMap[$i][$j] = false;
            $_SESSION["showMap"][$i][$j] = false;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>

    <style media="screen">
        .box {
            width: 50px;
            height: 50px;
            background-color: gray;
            margin: 0 auto;
            text-align: center;
            color: black;
            font-family: 'Terminal';
        }

        body {
            background-color: darkgray;
        }
    </style>


</head>

<body>
    <?php
    if (isset($_GET["row"]) && isset($_GET["col"])) {
        $parameterI = (int)$_GET["row"];
        $parameterJ = (int)$_GET["col"];

        // finalizar juego
        if ($map[$parameterI][$parameterJ] == '*') {
            header("location: ./index");
            session_destroy();
        } else {
            checkForMines($parameterI, $parameterJ, $map, $auxMap);



            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    if ($auxMap[$i][$j]) {
                        $_SESSION["showMap"][$i][$j] = $map[$i][$j];
                    }
                }
            }

            /*
            for ($i = 0; $i < $size; $i++) {
                for ($j = 0; $j < $size; $j++) {
                    echo $auxMap[$i][$j] . " ";
                }
                echo "<br>";
            }
            */
        }
    }
    ?>

    <?php
    /*
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if (!$auxMap[$i][$j]) {
                echo "x ";
            } else {
                echo $auxMap[$i][$j] . " ";
            }
        }
        echo "<br>";
    }
    */
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if (!$_SESSION["showMap"][$i][$j] || $_SESSION["showMap"][$i][$j] != '0'){
                echo  "x ";    
            }
            echo $_SESSION["showMap"][$i][$j] . " ";
        }
        echo "<br>";
    }

    ?>

    <table>
        <?php
        for ($i = 0; $i < $size; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $size; $j++) {
                echo "<td class='box'  style='color:black; background-color:lightgray'><a onclick='readPosition(" . $i . "," . $j . ");'>" .
                    $map[$i][$j] . "</a></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <script type="text/javascript">
        function readPosition(row, col) {
            document.location = "game.php?row=" + row + "&col=" + col;
        }
    </script>
</body>

</html>