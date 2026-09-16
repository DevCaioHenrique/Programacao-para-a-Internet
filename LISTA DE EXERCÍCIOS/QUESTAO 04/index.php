<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 04 - Tabuada Personalizada</title>
</head>
<body>
    <h1>Tabuada Personalizada</h1>
    <form method="POST" action="">
        <label for="numero">Número:</label>
        <input type="number" name="numero" id="numero" required>
        <br>
        <button type="submit">Gerar Tabuada</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero = intval($_POST['numero']);

        echo "<h2>Tabuada do $numero:</h2>";
        echo "<ul>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "<li>$numero x $i = $resultado</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
