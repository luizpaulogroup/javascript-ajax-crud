<?php

require_once("./conexao.php");

$nome = isset($_POST["nome_estudo"]) ? $_POST["nome_estudo"] : NULL;
$desc = isset($_POST["desc_estudo"]) ? $_POST["desc_estudo"] : NULL;

$sql = ("insert into tbestudo (nome, descricao) values (upper(:nome), upper(:desc))");

$stmt = Db::init()->prepare($sql);
$stmt->bindValue(":nome", $nome, PDO::PARAM_STR);
$stmt->bindValue(":desc", $desc, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "true";
} else {
    echo "false";
}

echo json_encode($retorno);
