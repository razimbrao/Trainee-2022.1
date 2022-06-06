<?php
define('HOST','127.0.0.1');
define('EMAIL','root');
define('SENHA',' ');
define('DB','monstershop');

$conexao = mysqli_connect(HOST,EMAIL,SENHA,DB) or die ('Não foi possivel conectar');
?>