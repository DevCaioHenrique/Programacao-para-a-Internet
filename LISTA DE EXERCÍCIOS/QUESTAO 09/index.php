<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questão 09 - Tabela de Notas</title>
</head>
<body>
    <h1>Tabela de Notas de uma Turma</h1>
    <form method="POST" action="">
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <fieldset>
                <legend>Aluno <?= $i ?></legend>
                <label for="nome<?= $i ?>">Nome:</label>
                <input type="text" name="nome<?= $i ?>" id="nome<?= $i ?>" required>
                <br>
                <label for="nota1_<?= $i ?>">Nota 1:</label>
                <input type="number" name="nota1_<?= $i ?>" id="nota1_<?= $i ?>" step="0.01" min="0" max="10" required>
                <br>
                <label for="nota2_<?= $i ?>">Nota 2:</label>
                <input type="number" name="nota2_<?= $i ?>" id="nota2_<?= $i ?>" step="0.01" min="0" max="10" required>
            </fieldset>
        <?php endfor; ?>
        <button type="submit">Gerar Tabela</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $alunos = [];
        for ($i = 1; $i <= 3; $i++) {
            $nome = $_POST["nome$i"];
            $nota1 = floatval($_POST["nota1_$i"]);
            $nota2 = floatval($_POST["nota2_$i"]);
            $media = ($nota1 + $nota2) / 2;
            $alunos[] = ["nome" => $nome, "nota1" => $nota1, "nota2" => $nota2, "media" => $media];
        }

        echo "<h2>Tabela de Notas:</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Aluno</th><th>Nota 1</th><th>Nota 2</th><th>Média</th></tr>";
        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>{$aluno['nome']}</td>";
            echo "<td>{$aluno['nota1']}</td>";
            echo "<td>{$aluno['nota2']}</td>";
            echo "<td>" . number_format($aluno['media'], 2, ',', '.') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
