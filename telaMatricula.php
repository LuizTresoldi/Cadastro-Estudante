<?php
require 'connectionMongoDB.php';

$querry = new MongoDB\Driver\Query([]);
$estudantes = $manager->executeQuery('cadastroEstudantes.estudantes', $querry);
$cursos = $manager->executeQuery('cadastroEstudantes.cursos', $querry);
$matriculas = $manager->executeQuery('cadastroEstudantes.matriculas', $querry)->toArray();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Matrículas</title>
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
        <h1 class="mb-4">Matrículas</h1>
        <?php if (isset($_GET['sucesso'])): ?>
            <div class="alert alert-success">A matrícula foi realizada com sucesso!</div>
        <?php endif; ?>

        <?php if (isset($_GET['erro']) && $_GET['erro'] == 'campoVazio'): ?>
            <div class="alert alert-danger">Selecione o estudante e o curso!</div>
        <?php endif; ?>

        <?php if (isset($_GET['erro']) && $_GET['erro'] == 'campoDuplicado'): ?>
            <div class="alert alert-warning">Esse estudante já foi matriculado nesse curso!</div>
        <?php endif; ?>
        <form action="processaMatricula.php" method="post">
            <div class="mb-3">
                <label for="estudanteId" class="form-label">Estudante:</label>
                <select class="form-select" id="estudanteId" name="estudanteId">
                    <option value="">Selecione um estudante</option>
                    <?php foreach ($estudantes as $estudante): ?>
                        <option value="<?= $estudante->_id ?>"><?= htmlspecialchars($estudante->nome) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="cursoId" class="form-label">Curso:</label>
                <select class="form-select" id="cursoId" name="cursoId">
                    <option value="">Selecione um curso</option>
                    <?php foreach ($cursos as $curso): ?>
                        <option value="<?= $curso->_id ?>"><?= htmlspecialchars($curso->nomeCurso) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="submit" value="Matricular" class="btn btn-primary">
        </form>
        <div class="mt-5">
            <h2>Matrículas Realizadas</h2>
            <?php if (isset($_GET['deletado'])): ?>
                 <div class="alert alert-success">Matrícula cancelada com sucesso!</div>
            <?php endif; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Estudante</th>
                        <th>Curso</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matriculas as $matricula):
                         $estudante = current($manager->executeQuery('cadastroEstudantes.estudantes', new MongoDB\Driver\Query(['_id' => $matricula->estudanteId]))->toArray());
                         $curso = current($manager->executeQuery('cadastroEstudantes.cursos', new MongoDB\Driver\Query(['_id' => $matricula->cursoId]))->toArray());
                    ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($estudante->nome) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($curso->nomeCurso) ?>
                            </td>
                            <td>
                                <?= date('d/m/Y', strtotime($matricula->dataMatricula)) ?>
                            </td>
                            <td>
                                <a href="deletarMatricula.php?id=<?= $matricula->_id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Cancelar esta matrícula?')">Cancelar Matrícula</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>