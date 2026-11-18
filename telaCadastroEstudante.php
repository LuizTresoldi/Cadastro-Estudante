<?php
require 'connectionMongoDB.php';

$querry = new MongoDB\Driver\Query([]);
$estudantes = $manager->executeQuery('cadastroEstudantes.estudantes', $querry);
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
        <h1 class="mb-4">Cadastro de Estudante</h1>
        <?php if (isset($_GET['sucesso'])): ?>
            <div class="alert alert-success">Estudante cadastrado com sucesso!</div>
        <?php endif; ?>
        <form action="processaEstudante.php" method="post">
            <div class="mb-3">
                <label for="nomeEstudante" class="form-label">Nome do estudante:</label>
                <input type="text" id="nomeEstudante" name="nomeEstudante" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ra" class="form-label">RA:</label>
                <input type="text" id="ra" name="ra" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" required>
            </div>

            <h2>Cadastro de Endereço</h2>

            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número:</label>
                <input type="text" id="numero" name="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" id="bairro" name="bairro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" id="cidade" name="cidade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">CEP:</label>
                <input type="text" id="cep" name="cep" class="form-control" required>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
    </div>
    </form>
    <div class="mt-5 container my-4">
        <h2>Estudantes Cadastrados</h2>
        <?php if (isset($_GET['atualizado'])): ?>
            <div class="alert alert-success">Estudante atualizado com sucesso!</div>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Estudante</th>
                    <th>Registro Acadêmico</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estudantes as $estudante): ?>
                    <tr>
                        <td><?= htmlspecialchars($estudante->nome) ?></td>
                        <td><?= htmlspecialchars($estudante->ra) ?></td>
                        <td><a href="updateEstudante.php?id=<?= $estudante->_id ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="deleteEstudante.php?id=<?= $estudante->_id ?>"
                                class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>

</html>