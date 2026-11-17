<?php
require 'connectionMongoDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $documento = [
        'nomeCurso'      => trim($_POST['nomeCurso']),
        'codigo'         => trim($_POST['codigo']),
        'cargaHoraria'   => trim($_POST['cargaHoraria']),
        'turno'          => trim($_POST['turno']),
        'qtdVagas'       => trim($_POST['qtdVagas']),
        'descricao' => $_POST['descricao'],
    ];

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($documento);
    $manager->executeBulkWrite('cadastroCursos.cursos', $bulk);

    header('Location: telaCadastroCurso.php?sucesso=1');
    exit;
}