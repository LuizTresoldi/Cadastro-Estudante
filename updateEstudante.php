<?php
require 'connectionMongoDB.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $filter = ['_id' => $id];
    $query = new MongoDB\Driver\Query($filter);
    $estudantes = $manager->executeQuery('cadastroEstudantes.estudantes', $query);
    $estudante = current($estudantes->toArray());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = new MongoDB\BSON\ObjectId($_POST['id']);
    $nomeEstudante = trim($_POST['nomeEstudante']);
    $ra = trim($_POST['ra']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $dataNascimento = $_POST['dataNascimento'];
    $logradouro = trim($_POST['logradouro']);
    $numero = trim($_POST['numero']);
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $cep = trim($_POST['cep']);



    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['_id' => $id],
        ['$set' => [
                'nome' => $nomeEstudante,
                'ra' => $ra,
                'cpf' => $cpf,
                'email' => $email,
                'telefone' => $telefone,
                'dataNascimento' => $dataNascimento,
                'endereco' => [
                    'logradouro' => $logradouro,
                    'numero' => $numero,
                    'bairro' => $bairro,
                    'cidade' => $cidade,
                    'cep' => $cep,
                ],
            ]
        ]
    );
    $manager->executeBulkWrite('cadastroEstudantes.estudantes', $bulk);

    header('Location: telaCadastroEstudante.php?atualizado=1');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Estudante</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'menuNavegacao.php'; ?>
    <div class="container my-4">
        <h1 class="mb-4">Atualizar Estudante</h1>
        <form action="updateEstudante.php" method="post">
            <input type="hidden" name="id" value="<?= $estudante->_id ?>">
            <div class="mb-3">
                <label for="nomeEstudante" class="form-label">Nome do estudante:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->nome) ?>" id="nomeEstudante" name="nomeEstudante" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ra" class="form-label">RA:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->ra) ?>" id="ra" name="ra" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->cpf) ?>" id="cpf" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" value="<?= htmlspecialchars($estudante->email) ?>" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->telefone) ?>" id="telefone" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" value="<?= htmlspecialchars($estudante->dataNascimento) ?>" id="dataNascimento" name="dataNascimento" class="form-control" required>
            </div>

            <h2>Endereço</h2>

            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->endereco->logradouro) ?>" id="logradouro" name="logradouro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->endereco->numero) ?>" id="numero" name="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->endereco->bairro) ?>" id="bairro" name="bairro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->endereco->cidade) ?>" id="cidade" name="cidade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">CEP:</label>
                <input type="text" value="<?= htmlspecialchars($estudante->endereco->cep) ?>" id="cep" name="cep" class="form-control" required>
            </div>

            <input type="submit" value="Atualizar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>