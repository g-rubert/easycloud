	<style>
	  /* Hide page by default */
	  html { display : none; }
	</style>
	
	<script>
	  if (self == top) {
		// Everything checks out, show the page.
		document.documentElement.style.display = 'block';
	  } else {
		// Break out of the frame.
		top.location = self.location;
	  }
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" href="world.png" type="image/x-icon" />
	<link rel="shortcut icon" href="world.png" type="image/x-icon" />
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<script language='Javascript'> function checartecla (evt) {if (evt.keyCode == '17') {alert(&quot;Comando Desativado&quot;) return false} return true} </script> 
	<title>Vizualizar</title>
</head>
<?php
	$stat = (int) $_GET['c3RhdHVz'];
	if( $stat == 777){
	include('conexao.inc.php');
	//recuperar o codigo do arquivo atraves do metodo GET

	$codigo= (int) $_GET['codigo']; //security by Guilherme
	$codigoes = filter_var($codigo, FILTER_SANITIZE_NUMBER_INT);
	$consulta = "SELECT `Arquivo`,`Tipo` FROM `arquivos` WHERE Codigo= ' ".$codigoes." ' ";
	$resultado = mysql_query($consulta); 
	$dados = mysql_fetch_array($resultado);
	$tipo = $dados['Tipo'];
	$tamanho = $dados['Tamanho'];
	$file =$dados['Arquivo'];
	$nome = mysql_real_escape_string($dados['NmArquivo']);//security by Guilherme
	
		 if($tipo=="text/html"){
			 echo " <script>alert('Possível tentativa de XSS Injection, apenas pdfs');";
			 echo "location.href='listarUsuario.php'</script>";
		}elseif($tipo=="text/plain"){
			echo " <script>alert('Possível tentativa de XSS Injection, apenas pdfs');";
			echo "location.href='listarUsuario.php'</script>";
		}elseif($tipo=="image/jpg"){
				header("Content-type: ".$tipo."");
					echo $file;	
		}elseif($tipo=="image/jpeg"){
					header("Content-type: ".$tipo."");
					echo $file;	
		}elseif($tipo=="image/png"){
				header("Content-type: ".$tipo."");
					echo $file;	
		}elseif($tipo==""){
			echo " <script>alert('Trabalhamos com uma política de segurança rigorosa, apenas pdfs');";
			echo "location.href='listarUsuario.php'</script>";
		}else{
					header("Content-type: ".$tipo."");
					echo $file;	
		}
	}
	 else{
		 
		 echo '
            <p>
                <span class="error"><div class="alert alert-warning" role="alert"><font color="orange">Você não tem autorização para acessar esta página.</span> Please <a href="index.php">login</a></div>
            </p>';
	 }
     

?>
<body>

		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		function click() {
			if (event.button == 2 || event.button == 3) {
				oncontextmenu='return false';
				alert ('Todos os direitos reservados');
			}
		}
		document.onmousedown = click
		document.oncontextmenu = new Function("return false;")
		</script>
</body>
</html>



