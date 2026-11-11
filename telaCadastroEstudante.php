<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Estudante</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container my-4">
        <h1 class="mb-4">Cadastro de Estudante</h1>
        <form action="processaCadastro.php" method="post">
            <div class="mb-3">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ra" class="form-label">RA:</label>
                <input type="number" id="ra" name="ra" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" id="cpf" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
                <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" required>
            </div>

            <h2>Cadastro de Endereço</h2>

            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro:</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Numero:</label>
                <input type="text" id="numero" name="numero" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro:</label>
                <input type="text" id="bairro" name="bairro" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cidade" class="form-label">Cidade:</label>
                <input type="text" id="cidade" name="cidade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">Cep:</label>
                <input type="text" id="cep" name="cep" class="form-control" required>
            </div>

            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </form>
    </body>
</html>