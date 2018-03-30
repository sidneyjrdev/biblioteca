<?php
if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    require_once 'banco.php';
    $banco = new Banco();
    $conn = $banco->pegarConexao();
    
    $sql="DELETE FROM livro WHERE id=$id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "<script>location.href='index.php';</script>";
}
?>
