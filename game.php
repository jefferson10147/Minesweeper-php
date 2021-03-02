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
        $auxMap[$row][$col] = '*';
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

for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        $auxMap[$i][$j] = false;
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
    if (isset($_GET["row"]) && isset($_GET["col"]) && !isset($_GET["change"])) {
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
   
    } elseif (isset($_GET["row"]) && isset($_GET["col"]) && isset($_GET["change"])) {
        $parameterI = (int)$_GET["row"];
        $parameterJ = (int)$_GET["col"];

        if ($map[$parameterI][$parameterJ] == '*'){
            $_SESSION["showMap"][$parameterI][$parameterJ] = 'B';
            $_SESSION["minesFound"] ++;

            if ($_SESSION["minesFound"] == $minesNumber){
                header("location: ./win_page.php");
            }
            
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

    /*
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            
            echo $_SESSION["showMap"][$i][$j] . " ";
        }
        echo "<br>";
    }
    */

    ?>

    <table>
        <?php
        for ($i = 0; $i < $size; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $size; $j++) {

                if ($_SESSION["showMap"][$i][$j] != 'x' && $_SESSION["showMap"][$i][$j] != '*') {

                    if ($_SESSION["showMap"][$i][$j] != '0' && $_SESSION["showMap"][$i][$j] != 'B') {
                        echo "<td class='box'  style='color:black; background-color:#bffa84'>" . $map[$i][$j] . "</td>";

                    } elseif ($_SESSION["showMap"][$i][$j] == 'B') {
                        echo "<td class='box'  style='color:black; background-color:#e30e0e'>" . $map[$i][$j] . "</td>";

                    } else {
                        echo "<td class='box'  style='color:black; background-color:#bffa84'></td>";
                    }

                } else {
                    echo "<td class='box'  style='color:black; background-color:lightgray'><a onmousedown='readPosition(" . $i . "," . $j . ", event);' >?</a></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>

    <button><a href="./close_session.php">Reset</a></button>

    <script type="text/javascript">
        function readPosition(row, col, event) {
            if (event.button == 1) {
                document.location = "game.php?row=" + row + "&col=" + col + "&change=1";

            } else if (event.button == 0){
                document.location = "game.php?row=" + row + "&col=" + col;
            }
        }
    </script>
</body>

</html>