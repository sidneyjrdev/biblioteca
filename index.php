<?php

    
    require_once 'banco.php';
    $banco = new Banco();
    $conn = $banco->pegarConexao();
    
    $sql="SELECT * FROM livro";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $lista = $stmt->fetchAll();
    

?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="file1.js" type="text/javascript"></script>
        <script src="file2.js" type="text/javascript"></script>
        <title>Sistema de biblioteca - lista</title>
    </head>
    <body>
        <h1>Sistema de biblioteca</h1>
        <hr>
        <a class="linkCriar" href="criar.php">Novo livro</a>
        <table cellpadding='2'>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php foreach($lista as $item){ ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['nome'] ?></td>
                    <td><?= $item['autor'] ?></td>
                    <td><?= $item['editora'] ?></td>
                    <td>
                      <a class="linkEditar" href="editar.php?id=<?= $item['id'] ?>">Editar</a> | 
                      <a class="linkExcluir" href="excluir.php?id=<?= $item['id'] ?>">Excluir</a>
                    </td>
                </tr>
                <?php } ?>      
            </tbody>
        </table>
        
    </body>
</html>
