<?php
require 'connectionMongoDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['estudanteId']) || empty($_POST['cursoId'])) {
        header('Location: telaMatricula.php?erro=campoVazio');
        exit;
    }

    $estudanteId = new MongoDB\BSON\ObjectId($_POST['estudanteId']);
    $cursoId     = new MongoDB\BSON\ObjectId($_POST['cursoId']);

    $filtro = ['estudanteId' => $estudanteId, 'cursoId' => $cursoId];
    $existe = $manager->executeQuery('cadastroEstudantes.matriculas', new MongoDB\Driver\Query($filtro))->toArray();

    if (count($existe) > 0) {
        header('Location: telaMatricula.php?erro=campoDuplicado');
        exit;
    }

    $documento = [
        'estudanteId'   => $estudanteId,
        'cursoId'       => $cursoId,
        'dataMatricula' => date('Y-m-d'),
    ];

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($documento);
    $manager->executeBulkWrite('cadastroEstudantes.matriculas', $bulk);

    header('Location: telaMatricula.php?sucesso=1');
    exit;
}