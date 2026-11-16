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
        <form action="processaMatricula.php" method="post">
            <div class="mb-3">
                <label for="estudanteId" class="form-label">Estudante:</label>
                <select class="form-select" id="estudanteId" name="estudanteId">
                    <option value="">Selecione um estudante</option>
                    <option value="1">Estudante exemplo</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="cursoId" class="form-label">Curso:</label>
                <select class="form-select" id="cursoId" name="cursoId">
                    <option value="">Selecione um curso</option>
                    <option value="1">Curso exemplo</option>
                </select>
            </div>

            <input type="submit" value="Matricular" class="btn btn-primary">
        </form>
        <div class="mt-5">
            <h2>Matrículas Realizadas</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Estudante</th>
                        <th>Curso</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Estudante exemplo</td>
                        <td>Curso exemplo</td>
                        <td><a href="#" class="btn btn-danger btn-sm">Cancelar Matrícula</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>