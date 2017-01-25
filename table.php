<?php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST)) {
        $arrayToCreateTable = $_POST;
        $numberOfRows = $_SESSION['rows'];
        $numberOfColumns = $_SESSION['columns'];
        $arrayToSnail = create2DArray($arrayToCreateTable, $numberOfRows, $numberOfColumns);
        printTableFrom2DArray($arrayToSnail);
        echo '<br> Rezultat: '.snail($arrayToSnail, $numberOfRows, $numberOfColumns);
    } else {
        echo 'metodą post przesłano nieprawidłowe dane';
    }
}


function create2DArray($array, $numberOfRows, $numberOfColumns) {
    $array2D = [];
    $index = 0;
    for ($i = 0; $i < $numberOfRows; $i++) {
        $array1D = [];
        for ($j = 0; $j < $numberOfColumns; $j++) {
            $value = $array[$index];
            $array1D[] = $value;
            $index ++;
        }
        $array2D[] = $array1D;
    }
    return $array2D;
}
function printTableFrom2DArray($array){
    echo '<table style="border: solid black 1px">';
    for ($i = 0; $i < count($array); $i++) {
        echo '<tr >';
        $array1D = $array[$i];
        for ($j = 0; $j < count($array1D); $j++) {
            $value = $array1D[$j];
            echo "<td style='border: solid black 1px'>$value</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}
function snail($array, $lastRow, $lastColumn) {

    $result = '';
    $firstRow = 0;
    $firstColumn = 0;
    
    while ($firstRow < $lastRow && $firstColumn < $lastColumn) {
       
        for ($i = $firstColumn; $i < $lastColumn; $i++) {
            $result .= $array[$firstRow][$i] . ', ';
        }
        $firstRow++;

        
        for ($i = $firstRow; $i < $lastRow; $i++) {
            $result .= $array[$i][$lastColumn - 1] . ', ';
        }
        $lastColumn--;

        
        if ($firstRow < $lastRow) {
            for ($i = $lastColumn - 1; $i >= $firstColumn; $i--) {
                $result .= $array[$lastRow - 1][$i] . ', ';
            }
            $lastRow--;
        }

        
        if ($firstColumn < $lastColumn) {
            for ($i = $lastRow - 1; $i >= $firstRow; $i--) {
                $result .= $array[$i][$firstColumn] . ', ';
            }
            $firstColumn++;
        }
    }
    
    return substr($result, 0, -2);
}
