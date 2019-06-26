<?php

$dsn = "mysql:dbname=anotacoes;host=mysql995.umbler.com";
$dbuser = "betateste";
$dbpass = "vitor33120360";

try{
    $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch(PDOException $e) {
    echo "Falhou: ".$e->getMessage();
    }
?>