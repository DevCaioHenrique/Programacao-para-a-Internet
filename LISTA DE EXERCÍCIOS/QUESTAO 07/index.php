<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 07 - Calculadora de Média</title>
</head>
<body>
    <h1>Calculadora de Média</h1>
    <form method="POST" action="">
        <?php for ($i = 1; $i <= 4; $i++): ?>
            <label for="nota<?= $i ?>">Nota <?= $i ?>:</label>
            <input type="number" name="nota<?= $i ?>" id="nota<?= $i ?>" step="0.01" min="0" max="10" required>
            <br>
        <?php endfor; ?>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $notas = [];
        $soma = 0;

        for ($i = 1; $i <= 4; $i++) {
            $nota = floatval($_POST["nota$i"]);
            $notas[] = $nota;
            $soma += $nota;
        }

        $media = $soma / 4;
        $situacao = $media >= 7 ? "Aprovado" : ($media >= 5 ? "Recuperação" : "Reprovado");

        echo "<h2>Resultado:</h2>";
        echo "Notas: " . implode(", ", $notas) . "<br>";
        echo "Soma das notas: $soma<br>";
        echo "Média: " . number_format($media, 2, ',', '.') . "<br>";
        echo "Situação: $situacao";
    }
    ?>
</body>
</html>
