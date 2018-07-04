
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Documento sem título</title>
	</head>
	<?php 
		require_once('conexao.inc.php');

		//recupera os dados enviados atraves do formulário
		//NOME TEMPORÁRIO
		$file_tmp = $_FILES["file"]["tmp_name"];
		 //NOME DO ARQUIVO NO COMPUTADOR
		$file_name = $_FILES["file"]["name"];
		//TAMANHO DO ARQUIVO
		$file_size = $_FILES["file"]["size"];
		//MIME DO ARQUIVO
		$file_type = $_FILES["file"]["type"];
		$nome = htmlspecialchars($_POST['nome']);
		$versao = htmlspecialchars($_POST['versao']);
		$descricao = htmlspecialchars($_POST['desc']);
		
			
			//antes de ler o conteudo do arquivo você pode fazer upload para compactar em .ZIP ou .RAR, no caso de imagem você poderá redimensionar o tamanho antes de gravar no banco. Claro que depende da sua necessidade.
		 
		//Para fazer UPLOAD poderá usar COPY ou MOVE_UPLOADED_FILE
		
		copy($file_tmp, "backup/$file_name");
		//move_uploaded_file($file_tmp,"caminho/pasta/$file_name");
		 
		//lemos o  conteudo do arquivo usando afunção do PHP  file_get_contents
		$binario = file_get_contents($file_tmp);
		// evitamos erro de sintaxe do MySQL
		$binario = mysql_real_escape_string($binario);
		 
		//montamos o SQL para envio dos dados
		$sql = "INSERT INTO `projeto`.`arquivos` (`Codigo` ,`NmArquivo` ,`Descricao` , `Arquivo` ,`Tipo` ,`Tamanho` ,`descricaoUser`, `Nome`, `Versao`, `DtHrEnvio`)
		VALUES ('0', '$file_name', '$file_name', '$binario', '$file_type', '$file_size','$descricao',' $nome', '$versao', CURRENT_TIMESTAMP)";
		
		//header("Location: listar.php");
		//executamos a instução SQL
		mysql_query("$sql") or die(" Powered EasyCloud Security ");
		


		//Mensagem de sucesso
		 { 
			echo "<script>alert('Arquivo Enviado com sucesso !!');window.location='home.php'</script>"; 
		} 

	?>
	<body>
	</body>
</html>

