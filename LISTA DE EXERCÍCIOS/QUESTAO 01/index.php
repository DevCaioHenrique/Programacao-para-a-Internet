<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 01 - Cálculo de Desconto</title>
</head>
<body>
    <h1>Cálculo de Desconto</h1>
    <form method="POST" action="">
        <label for="valor">Valor da Compra:</label>
        <input type="number" name="valor" id="valor" step="0.01" required>
        <br>
        <label for="codigo">Código do Cliente:</label>
        <select name="codigo" id="codigo" required>
            <option value="1">Cliente Comum</option>
            <option value="2">Cliente VIP</option>
            <option value="3">Funcionário</option>
        </select>
        <br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $valor = floatval($_POST['valor']);
        $codigo = intval($_POST['codigo']);
        $desconto = 0;

        if ($valor > 0 && in_array($codigo, [1, 2, 3])) {
            switch ($codigo) {
                case 1:
                    $desconto = 0.05;
                    break;
                case 2:
                    $desconto = 0.10;
                    break;
                case 3:
                    $desconto = 0.15;
                    break;
            }

            $valorDesconto = $valor * $desconto;
            $valorFinal = $valor - $valorDesconto;

            echo "<h2>Resultado:</h2>";
            echo "Valor Original: R$ " . number_format($valor, 2, ',', '.') . "<br>";
            echo "Percentual de Desconto: " . ($desconto * 100) . "%<br>";
            echo "Valor do Desconto: R$ " . number_format($valorDesconto, 2, ',', '.') . "<br>";
            echo "Valor Final: R$ " . number_format($valorFinal, 2, ',', '.') . "<br>";
        } else {
            echo "<p style='color: red;'>Por favor, insira um valor válido e um código de cliente válido.</p>";
        }
    }
    ?>
</body>
</html>
