<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 02 - Classificação de Triângulos</title>
</head>
<body>
    <h1>Classificação de Triângulos</h1>
    <form method="POST" action="">
        <label for="lado1">Lado 1:</label>
        <input type="number" name="lado1" id="lado1" step="0.01" required>
        <br>
        <label for="lado2">Lado 2:</label>
        <input type="number" name="lado2" id="lado2" step="0.01" required>
        <br>
        <label for="lado3">Lado 3:</label>
        <input type="number" name="lado3" id="lado3" step="0.01" required>
        <br>
        <button type="submit">Classificar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lado1 = floatval($_POST['lado1']);
        $lado2 = floatval($_POST['lado2']);
        $lado3 = floatval($_POST['lado3']);

        if ($lado1 > 0 && $lado2 > 0 && $lado3 > 0 &&
            $lado1 + $lado2 > $lado3 &&
            $lado1 + $lado3 > $lado2 &&
            $lado2 + $lado3 > $lado1) {
            if ($lado1 === $lado2 && $lado2 === $lado3) {
                $classificacao = "Equilátero";
            } elseif ($lado1 === $lado2 || $lado1 === $lado3 || $lado2 === $lado3) {
                $classificacao = "Isósceles";
            } else {
                $classificacao = "Escaleno";
            }

            echo "<h2>Resultado:</h2>";
            echo "Lados: $lado1, $lado2, $lado3<br>";
            echo "Classificação: $classificacao";
        } else {
            echo "<p style='color: red;'>Os valores informados não formam um triângulo válido.</p>";
        }
    }
    ?>
</body>
</html>
