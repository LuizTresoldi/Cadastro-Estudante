<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Estudante</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Cadastro de Estudante</h1>
        <form action="processaCadastro.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="ra">RA:</label>
            <input type="number" id="ra" name="ra" required><br><br>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required><br><br>

            <label for="dataNascimento">Data de Nascimento:</label>
            <input type="date" id="dataNascimento" name="dataNascimento" required><br><br>

            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>