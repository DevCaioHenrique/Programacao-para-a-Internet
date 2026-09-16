<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 03 - Cálculo de IMC</title>
</head>
<body>
    <h1>Cálculo de IMC</h1>
    <form method="POST" action="">
        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" id="peso" step="0.01" required>
        <br>
        <label for="altura">Altura (m):</label>
        <input type="number" name="altura" id="altura" step="0.01" required>
        <br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $peso = floatval($_POST['peso']);
        $altura = floatval($_POST['altura']);

        if ($peso > 0 && $altura > 0) {
            $imc = $peso / ($altura ** 2);
            $categoria = "";

            if ($imc < 18.5) {
                $categoria = "Abaixo do peso";
            } elseif ($imc < 25) {
                $categoria = "Peso normal";
            } elseif ($imc < 30) {
                $categoria = "Sobrepeso";
            } else {
                $categoria = "Obesidade";
            }

            echo "<h2>Resultado:</h2>";
            echo "Peso: $peso kg<br>";
            echo "Altura: $altura m<br>";
            echo "IMC: " . number_format($imc, 2, ',', '.') . "<br>";
            echo "Categoria: $categoria";
        } else {
            echo "<p style='color: red;'>Por favor, insira valores válidos para peso e altura.</p>";
        }
    }
    ?>
</body>
</html>
