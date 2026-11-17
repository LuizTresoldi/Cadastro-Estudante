<?php
require 'connectionMongoDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $documento = [
        'nome'           => trim($_POST['nomeEstudante']),
        'ra'             => trim($_POST['ra']),
        'cpf'            => trim($_POST['cpf']),
        'email'          => trim($_POST['email']),
        'telefone'       => trim($_POST['telefone']),
        'dataNascimento' => $_POST['dataNascimento'],
        'endereco'       => [
            'logradouro' => trim($_POST['logradouro']),
            'numero'     => trim($_POST['numero']),
            'bairro'     => trim($_POST['bairro']),
            'cidade'     => trim($_POST['cidade']),
            'cep'        => trim($_POST['cep']),
        ],
    ];

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($documento);
    $manager->executeBulkWrite('cadastroEstudantes.estudantes', $bulk);

    header('Location: telaCadastroEstudante.php?sucesso=1');
    exit;
}