<?php
 include('conexao.inc.php'); 
 include_once 'includes/db_connect.php';
 include_once 'includes/functions.php';
  
sec_session_start();


 if (login_check($mysqli) == true){
	 
 $codigo = (int) $_GET['codigo'];
	mysql_query("DELETE FROM `projeto`.`arquivos` WHERE Codigo = '".$codigo."'");
	echo "<script>alert('Arquivo apagado com sucesso!');";
	echo "location.href='listarUsuario.php'</script>";
 }
 else {
			echo"
            <p>
                <span class='error'><div class='alert alert-warning' role='alert'><font color='orange'>Você não tem autorização para acessar esta página.</span> Please <a href='admin123ADMIN/index.php'>login</a></div>
            </p>";
 }
  
  ?>

 