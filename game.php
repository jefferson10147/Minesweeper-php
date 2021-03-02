<?php
session_start();

$size = $_SESSION["size"];
$minesNumber = $_SESSION["minesNumber"];
$map = $_SESSION["matrixMap"];
/*
// imprimiendo la matriz
for ($i = 0; $i < $size; $i++){
    for ($j = 0; $j < $size; $j++){
        echo $_SESSION["matrix_map"][$i][$j]." ";        
    }
    echo "<br>";
}

*/


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

    <table>
        <?php
        for ($i = 0; $i < $size; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $size; $j++) {
                echo "<td class='box'  style='color:black; background-color:lightgray'><a onclick='readPosition(" . $i . "," . $j . ");'>" .
                    $map[$i][$j]. "</a></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>


    <script type="text/javascript">
        function readPosition(row,col){
            alert("row="+row+"&col="+col);
            document.location="game.php?row="+row+"&col="+col;
        }
    </script>
</body>
</html>