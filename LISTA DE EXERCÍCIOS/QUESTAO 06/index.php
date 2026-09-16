<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 06 - Estatística de Alturas</title>
</head>
<body>
    <h1>Estatística de Alturas</h1>
    <form method="POST" action="">
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <fieldset>
                <legend>Pessoa <?= $i ?></legend>
                <label for="idade<?= $i ?>">Idade:</label>
                <input type="number" name="idade<?= $i ?>" id="idade<?= $i ?>" required>
                <br>
                <label for="altura<?= $i ?>">Altura (m):</label>
                <input type="number" name="altura<?= $i ?>" id="altura<?= $i ?>" step="0.01" required>
            </fieldset>
        <?php endfor; ?>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idades = [];
        $alturas = [];
        $maiorAltura = 0;
        $menorAltura = PHP_FLOAT_MAX;
        $somaAlturasAdultos = 0;
        $qtdAdultos = 0;

        for ($i = 1; $i <= 10; $i++) {
            $idade = intval($_POST["idade$i"]);
            $altura = floatval($_POST["altura$i"]);

            $idades[] = $idade;
            $alturas[] = $altura;

            if ($altura > $maiorAltura) {
                $maiorAltura = $altura;
            }
            if ($altura < $menorAltura) {
                $menorAltura = $altura;
            }
            if ($idade > 18) {
                $somaAlturasAdultos += $altura;
                $qtdAdultos++;
            }
        }

        $mediaAlturasAdultos = $qtdAdultos > 0 ? $somaAlturasAdultos / $qtdAdultos : 0;

        echo "<h2>Resultados:</h2>";
        echo "Maior altura: " . number_format($maiorAltura, 2, ',', '.') . " m<br>";
        echo "Menor altura: " . number_format($menorAltura, 2, ',', '.') . " m<br>";
        if ($qtdAdultos > 0) {
            echo "Média de altura dos maiores de 18 anos: " . number_format($mediaAlturasAdultos, 2, ',', '.') . " m<br>";
        } else {
            echo "Nenhuma pessoa com mais de 18 anos foi informada.<br>";
        }
    }
    ?>
</body>
</html>
