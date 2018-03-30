<?php

$id = 0;

if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once 'banco.php';
    $banco = new Banco();
    $conn = $banco->pegarConexao();
    
    $sql="SELECT * FROM livro WHERE id=$id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    

}


if(isset($_POST['btnEditar'])){
    $nome = $_POST['txtNome'];
    $autor = $_POST['txtAutor'];
    $editora = $_POST['txtEditora'];
    
    require_once 'banco.php';
    $banco = new Banco();
    $conn = $banco->pegarConexao();
    
    $sql="UPDATE livro SET nome='$nome', autor='$autor', editora='$editora' WHERE id=$id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<script>location.href='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Sistema de biblioteca - editar</title>
    </head>
    <body>
        <h1>Editar livro</h1>
        <hr>
        <form name="frmEditar" method="post">

            <label for="txtNome">Nome:</label>
            <input type="text" id="txtNome" name="txtNome" value="<?= $item['nome'] ?>" required/><br><br>

            <label for="txtAutor">Autor:</label>
            <input type="text" id="txtAutor" name="txtAutor" value="<?= $item['autor'] ?>" required/><br><br>

            <label for="txtEditora">Editora:</label>
            <input type="text" id="txtEditora" name="txtEditora" value="<?= $item['editora'] ?>" required/><br><br>

            <input type="submit" class="btnEditar" value="Editar" name="btnEditar"><br><br>
        </form>
        <a class="linkVoltar" href="index.php">Voltar</a>

    </body>
</html>