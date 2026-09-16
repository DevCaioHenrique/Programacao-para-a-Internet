<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 05 - Cálculo de Juros Compostos</title>
</head>
<body>
    <h1>Cálculo de Juros Compostos</h1>

    <?php
    $capitalInicial = 1000.00;
    $taxaJuros = 0.015;
    $periodo = 12;

    echo "<h2>Simulação de Investimento:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Mês</th><th>Saldo Inicial</th><th>Rendimento</th><th>Saldo Acumulado</th></tr>";

    $saldo = $capitalInicial;
    for ($mes = 1; $mes <= $periodo; $mes++) {
        $rendimento = $saldo * $taxaJuros;
        $saldo += $rendimento;

        echo "<tr>";
        echo "<td>$mes</td>";
        echo "<td>R$ " . number_format($saldo - $rendimento, 2, ',', '.') . "</td>";
        echo "<td>R$ " . number_format($rendimento, 2, ',', '.') . "</td>";
        echo "<td>R$ " . number_format($saldo, 2, ',', '.') . "</td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<p>Saldo final após $periodo meses: <strong>R$ " . number_format($saldo, 2, ',', '.') . "</strong></p>";
    ?>
</body>
</html>
