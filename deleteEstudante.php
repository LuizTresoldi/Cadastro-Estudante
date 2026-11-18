<?php
require 'connectionMongoDB.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['_id' => $id]);

    $manager->executeBulkWrite('cadastroEstudantes.estudantes', $bulk);
    //Melhoria sugrida por IA: Ao apagar o estudante, também apagar as matrículas associadas a ele
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['estudanteId' => $id]);
    $manager->executeBulkWrite('cadastroEstudantes.matriculas', $bulk);

    header('Location: telaCadastroEstudante.php?deletado=1');
    exit;
}