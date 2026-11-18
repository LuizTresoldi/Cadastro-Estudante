<?php
require 'connectionMongoDB.php';

$querry = new MongoDB\Driver\Query([]);
$cursos = $manager->executeQuery('cadastroEstudantes.cursos', $querry);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Curso</title>
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
        <h1 class="mb-4">Cadastro de Curso</h1>
        <?php if (isset($_GET['sucesso'])): ?>
            <div class="alert alert-success">Curso cadastrado com sucesso!</div>
        <?php endif; ?>
        <form action="processaCadastroCurso.php" method="post">
            <div class="mb-3">
                <label for="nomeCurso" class="form-label">Nome do curso:</label>
                <input type="text" id="nomeCurso" name="nomeCurso" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" id="codigo" name="codigo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga horária:</label>
                <input type="number" id="cargaHoraria" name="cargaHoraria" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="turno" class="form-label">Turno:</label>
                <select class="form-select" id="turno" name="turno" required>
                    <option value="">Selecione o turno</option>
                    <option value="manha">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="qtdVagas" class="form-label">Quantidade de Vagas:</label>
                <input type="number" id="qtdVagas" name="qtdVagas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" id="descricao" name="descricao" class="form-control" required>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>

        <div class="mt-5 container my-4">
        <h2>Cursos Cadastrados</h2>
        <?php if (isset($_GET['atualizado'])): ?>
            <div class="alert alert-success">Curso atualizado com sucesso!</div>
        <?php endif; ?>
        <?php if (isset($_GET['deletado'])): ?>
            <div class="alert alert-success">Curso deletado com sucesso!</div>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Código</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $curso): ?>
                    <tr>
                        <td><?= htmlspecialchars($curso->nomeCurso) ?></td>
                        <td><?= htmlspecialchars($curso->codigo) ?></td>
                        <td><a href="updateCurso.php?id=<?= $curso->_id ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="deleteCurso.php?id=<?= $curso->_id ?>" onclick="return confirm('Excluir este curso?')"
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