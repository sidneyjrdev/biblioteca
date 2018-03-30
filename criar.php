<?php

if(isset($_POST['btnCadastrar'])){
    $nome = $_POST['txtNome'];
    $autor = $_POST['txtAutor'];
    $editora = $_POST['txtEditora'];
    
    require_once 'banco.php';
    $banco = new Banco();
    $conn = $banco->pegarConexao();
    
    $sql="INSERT INTO livro(nome,autor,editora) VALUES('$nome', '$autor', '$editora')";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Sistema de biblioteca - criar</title>
    </head>
    <body>
        <h1>Novo livro</h1>
        <hr>
        <form name="frmCriar" method="post">

            <label for="txtNome">Nome:</label>
            <input type="text" id="txtNome" name="txtNome" placeholder="Insira o nome do livro..." required/><br><br>

            <label for="txtAutor">Autor:</label>
            <input type="text" id="txtAutor" name="txtAutor" placeholder="Insira o autor do livro..." required/><br><br>

            <label for="txtEditora">Editora:</label>
            <input type="text" id="txtEditora" name="txtEditora" placeholder="Insira a editora do livro..." required/><br><br>

            <input type="submit" class="btnCadastrar" value="Cadastrar" name="btnCadastrar"><br><br>
        </form>
<a class="linkVoltar" href="index.php">Voltar</a>
    </body>
</html>