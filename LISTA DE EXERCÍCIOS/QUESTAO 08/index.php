<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 08 - Análise de Faturamento</title>
</head>
<body>
    <h1>Análise de Faturamento Diário</h1>
    <form method="POST" action="">
        <?php
        $dias = ["Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado", "Domingo"];
        foreach ($dias as $i => $dia): ?>
            <label for="dia<?= $i ?>"><?= $dia ?>:</label>
            <input type="number" name="dia<?= $i ?>" id="dia<?= $i ?>" step="0.01" required>
            <br>
        <?php endforeach; ?>
        <button type="submit">Analisar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $faturamentos = [];
        foreach ($dias as $i => $dia) {
            $faturamentos[$dia] = floatval($_POST["dia$i"]);
        }

        $total = array_sum($faturamentos);
        $media = $total / count($faturamentos);
        $maiorDia = array_keys($faturamentos, max($faturamentos))[0];
        $diasAcimaMedia = count(array_filter($faturamentos, fn($valor) => $valor > $media));

        echo "<h2>Resultados:</h2>";
        echo "Faturamento total: R$ " . number_format($total, 2, ',', '.') . "<br>";
        echo "Média semanal: R$ " . number_format($media, 2, ',', '.') . "<br>";
        echo "Dia com maior faturamento: $maiorDia<br>";
        echo "Dias acima da média: $diasAcimaMedia";
    }
    ?>
</body>
</html>
