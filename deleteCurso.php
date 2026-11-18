<?php
require 'connectionMongoDB.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['_id' => $id]);

    $manager->executeBulkWrite('cadastroEstudantes.cursos', $bulk);
    //Melhoria sugrida por IA: Ao apagar o curso, também apagar as matrículas associadas a ele
    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->delete(['cursoId' => $id]);
    $manager->executeBulkWrite('cadastroEstudantes.matriculas', $bulk);

    header('Location: telaCadastroCurso.php?deletado=1');
    exit;
}