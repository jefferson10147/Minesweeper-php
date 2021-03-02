<?php


    if (!isset($_GET["size"])){
        header("location: ./index.php");
    }

    $size = $_GET["size"];
    $minesNumber = round($size * 0.35);
    
    session_start();

    //creando la matriz
    for ($i = 0; $i < $size; $i++){
        for ($j = 0; $j < $size; $j++){
            $_SESSION["matrixMap"][$i][$j] = '0';        
        }
    }
    
    // colocando minas 
    $minesLaid = 0;
    while ($minesLaid < $minesNumber){
        $row = rand(0,$size-1);
        $col = rand(0,$size-1);
        if ($_SESSION["matrixMap"][$row][$col] == '0' ){
            $_SESSION["matrixMap"][$row][$col] = '*';
            $minesLaid ++;
        }
    }

    // imprimiendo la matriz
    for ($i = 0; $i < $size; $i++){
        for ($j = 0; $j < $size; $j++){
            echo $_SESSION["matrixMap"][$i][$j]." ";        
        }
        echo "<br>";
    }

    $_SESSION["size"] = $size;
    $_SESSION["minesNumber"] = $minesNumber;

    header("location: ./game.php");
?>