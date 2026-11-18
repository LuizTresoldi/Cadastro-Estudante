<?php
require 'connectionMongoDB.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $filter = ['_id' => $id];
    $query = new MongoDB\Driver\Query($filter);
    $cursos = $manager->executeQuery('cadastroEstudantes.cursos', $query);
    $curso = current($cursos->toArray());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = new MongoDB\BSON\ObjectId($_POST['id']);
    $nomeCurso = trim($_POST['nomeCurso']);
    $codigo = trim($_POST['codigo']);
    $cargaHoraria = trim($_POST['cargaHoraria']);
    $turno = trim($_POST['turno']);
    $qtdVagas = trim($_POST['qtdVagas']);
    $descricao = trim($_POST['descricao']);

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->update(
        ['_id' => $id],
        ['$set' => [
            'nomeCurso' => $nomeCurso,
            'codigo' => $codigo,
            'cargaHoraria' => $cargaHoraria,
            'turno' => $turno,
            'qtdVagas' => $qtdVagas,
            'descricao' => $descricao,
        ]]
    );
    $manager->executeBulkWrite('cadastroEstudantes.cursos', $bulk);

    header('Location: telaCadastroCurso.php?atualizado=1');
    exit;
}
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
        <h1 class="mb-4">Atualizar Curso</h1>
        <form action="updateCurso.php" method="post">
            <input type="hidden" name="id" value="<?= $curso->_id ?>">
            <div class="mb-3">
                <label for="nomeCurso" class="form-label">Nome do curso:</label>
                <input type="text" value="<?= htmlspecialchars($curso->nomeCurso) ?>" id="nomeCurso" name="nomeCurso" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" value="<?= htmlspecialchars($curso->codigo) ?>" id="codigo" name="codigo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cargaHoraria" class="form-label">Carga horária:</label>
                <input type="number" value="<?= htmlspecialchars($curso->cargaHoraria) ?>" id="cargaHoraria" name="cargaHoraria" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="turno" class="form-label">Turno:</label>
                <!-- Usei IA para fazer essa parada do select, que serve para quando carregar o formulário já vir preenchido -->
                <select class="form-select" id="turno" name="turno" required>
                    <option value="">Selecione o turno</option>
                    <option value="manha" <?= $curso->turno == 'manha' ? 'selected' : '' ?>>Manhã</option>
                    <option value="tarde" <?= $curso->turno == 'tarde' ? 'selected' : '' ?>>Tarde</option>
                    <option value="noite" <?= $curso->turno == 'noite' ? 'selected' : '' ?>>Noite</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="qtdVagas" class="form-label">Quantidade de Vagas:</label>
                <input type="number" value="<?= htmlspecialchars($curso->qtdVagas) ?>" id="qtdVagas" name="qtdVagas" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" value="<?= htmlspecialchars($curso->descricao) ?>" id="descricao" name="descricao" class="form-control" required>
            </div>

            <input type="submit" value="Atualizar" class="btn btn-primary">
        </form>
    </div>
</body>
</html>