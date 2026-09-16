<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 10 - Soma da Diagonal Principal</title>
</head>
<body>
    <h1>Soma da Diagonal Principal</h1>

    <?php
    $matriz = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $matriz[$i][$j] = rand(1, 100);
        }
    }

    $somaDiagonal = 0;
    $elementosDiagonal = [];
    for ($i = 0; $i < 3; $i++) {
        $somaDiagonal += $matriz[$i][$i];
        $elementosDiagonal[] = $matriz[$i][$i];
    }

    echo "<h2>Matriz Gerada:</h2>";
    echo "<table border='1'>";
    for ($i = 0; $i < 3; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
            echo "<td>{$matriz[$i][$j]}</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

    echo "<h2>Resultados:</h2>";
    echo "Elementos da diagonal principal: " . implode(" + ", $elementosDiagonal) . "<br>";
    echo "Soma da diagonal principal: $somaDiagonal";
    ?>
</body>
</html>
