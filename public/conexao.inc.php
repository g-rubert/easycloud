<?php
//conexao.inc.php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$conexao = mysql_connect("localhost:port", "seuusuariodobd","suasenhadobd");
mysql_select_db("projeto", $conexao)or die('Could not select database.');
 ?>
