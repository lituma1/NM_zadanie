<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($_POST['rows']) && is_numeric($_POST['columns'])) {
        $rows = $_POST['rows'];
        $columns = $_POST['columns'];
        $_SESSION['rows'] = $rows;
        $_SESSION['columns'] = $columns;
        
        createFormWithRandomNumbers($rows, $columns);

    } else {
        echo 'metodą post przesłano nieprawidłowe dane';
    }
}

function createFormWithRandomNumbers($rows, $columns) {
    echo '<form action="table.php" method="POST">';
    for ($i=1; $i<=$rows; $i++) {
        for ($j=0; $j<$columns; $j++){
           $value = RandomString(2);
           echo "<input type='text' style='width: 50px;' name='$i$j' value='$value'>";
        }
        echo '<br>';
    }
    echo '<p><input type="submit" value="Oblicz"></p>';
    echo '</form>';
}
function randomString($length) {
    $original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
    $original_string = implode("", $original_string);
    return substr(str_shuffle($original_string), 0, $length);
}