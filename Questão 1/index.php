<?php
$valorFinal = $valorDesconto = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valor = floatval($_POST['valor'] ?? 0);
    $tipo = intval($_POST['tipo'] ?? 1);
    $percentual = 0;

    switch ($tipo) {
        case 1: 
            $percentual = 0.05; // 5% para Cliente Comum
            break; 
        case 2: 
            $percentual = 0.10; // 10% para VIP
            break; 
        case 3: 
            $percentual = 0.15; // 15% para Funcionário
            break; 
    }

    $valorDesconto = $valor * $percentual;
    $valorFinal = $valor - $valorDesconto;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Questão 1 - Cálculo de Desconto</title>
</head>
<body>
    <h2>Cálculo de Desconto em Compra</h2>
    
    <form method="POST" action="">
        <label for="valor">Valor Total da Compra (R$):</label><br>
        <input type="number" step="0.01" id="valor" name="valor" required autofocus><br><br>

        <label for="tipo">Tipo de Cliente:</label><br>
        <select id="tipo" name="tipo">
            <option value="1">1 - Cliente Comum (5% de desconto)</option>
            <option value="2">2 - VIP (10% de desconto)</option>
            <option value="3">3 - Funcionário (15% de desconto)</option>
        </select><br><br>

        <button type="submit">Calcular Desconto</button>
    </form>

    <?php if ($valorFinal !== null): ?>
        <hr>
        <h3>Resultado:</h3>
        <p>Valor do Desconto: R$ <?= number_format($valorDesconto, 2, ',', '.') ?></p>
        <p>Valor Final a Pagar: <strong>R$ <?= number_format($valorFinal, 2, ',', '.') ?></strong></p>
    <?php endif; ?>
</body>
</html>