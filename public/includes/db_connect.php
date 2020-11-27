<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
include_once 'psl-config.php';   // Já que functions.php não está incluso
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
?>