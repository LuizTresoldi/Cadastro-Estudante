<?php
require 'connectionMongoDB.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['_id' => $id]);

    $manager->executeBulkWrite('cadastroEstudantes.matriculas', $bulk);

    header('Location: telaMatricula.php?deletado=1');
    exit;
}