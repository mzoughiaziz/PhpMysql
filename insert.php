<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=easyjur", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

$uf = $_POST['uf'];


try{
    $sql = "INSERT INTO company (uf, fantasy_name, cnpj) VALUES (:uf, :fantasy_name, :cnpj)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':uf', $_REQUEST['uf']);
    $stmt->bindParam(':fantasy_name', $_REQUEST['fantasy_name']);
    $stmt->bindParam(':cnpj', $_REQUEST['cnpj']);

    $stmt->execute();
    header('Location: inc/comp.php');
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

unset($pdo);
?>