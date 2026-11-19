# Cadastro de Estudante

Sistema que possibilita a criação de estudantes, cursos e permite fazer a matrícula

## Tecnologias:
HTML, BOOTSTRAP, PHP e MongoDB

## Como rodar:

Basicamente é necessário ter o XAMPP, clonar o repositório dentro da pasta htdocs do xampp, ter o mongodb rodando, já com a extensão do php instalada, depois disso é apenas abrir o localhost (http://localhost/Cadastro-Estudante) e selecionar a pasta Cadastro-Estudante que é referente ao projeto.

## Estrutura do banco:

O banco de dados se chama cadastroEstudantes e tem 3 coleções (estudantes, cursos e matriculas), o endereço fica dentro de estudante e a matrícula usa referência.

## Funcionalidades:
- A tela de cadastro de estudante permite cadastrar estudante juntamente com o seu endereço, também permite visualizar, editar e excluir o estudante.
- A tela de cadastro de curso permite cadastrar cursos, visualizar, editar e excluir o curso.
- A tela de matrícula, permite matricular um estudante, ou seja, vincular um estudante a um curso ou vice versa, também permite visualizar e cancelar a matrícula.

## Etapas do desenvolvimento:
Primeiro comecei criando o form básico das 3 telas cadastro de estudante, curso e a matrícula, posteriormente fiz a conexão com o mongoDB, após isso dei sequencia no CRUD do cadastro de estudante e curso, por fim finalizando a parte da matrícula.

## Nome:

Luiz Fernando Tresoldi Miguel - R.A: 60008139