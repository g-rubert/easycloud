<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require_once('VirusTotalApiV2.php');

$api = new VirusTotalAPIV2('SUA API_KEY DO VTOTAL');


sec_session_start();
$status = 0;
?>
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

<html>
    <head>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Arquivos na nuvem </title>
        <link rel="icon" href="home1.png" type="image/x-icon" />
        <script language='Javascript'> function checartecla(evt) {
                if (evt.keyCode == '17') {
                    alert( & quot; Comando Desativado & quot; ) return false}
                return true
            }</script>
    </head>

    <body style="padding-top: 80px">

        <?php
        if (login_check($mysqli) == true) :
            $status = 777;
            ?>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li ><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp HOME <span class="sr-only">(current)</span></a></li>
                            <li><a href="home.php"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp UPLOAD DE ARQUIVOS</a></li>
                            <li class="active"><a href="listarUsuario.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>&nbspARQUIVOS COMPARTILHADOS</a></li>
                            <li><a href="https://www.survio.com/survey/d/E8L9Y8P4N7H3D2H9Pl" target="_blank"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp FEEDBACK</a></li>
                            <li><a href="sobre.php"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp SOBRE</a></li>
                        </ul>		  
                        <ul class="nav navbar-nav navbar-right">
                            <form id="filtrar" class="navbar-form navbar-left" action="filtro.php" role="search" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="txtFiltro" autocomplete="off" placeholder="Pesquisar"/>
                                </div>
                                <input class="btn btn-default" type="submit" name="btnFiltro" class="btnFiltro" value="Pesquisar"/>
                            </form>
                            <li style="padding-right: 5px"><button type="button" class="btn navbar-btn btn-danger"><a style="color: white" href="includes/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a></button></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <img src="cloudimage.png" width="100">
                    <h1>EasyCloud</h1>
                </div>
                <div class="panel-body">
                    <?php
                    header("X-Frame-Options: DENY");
                    header("Content-Security-Policy: frame-ancestors 'none'", false);
                    include('conexao.inc.php');

                    $consulta = "SELECT `Codigo`,`NmArquivo`,`Descricao`,`Tipo`,`Tamanho`, `DescricaoUser`, `Nome`, `Versao` 	FROM `arquivos`";
                    $resultado = mysql_query($consulta);


                    echo "			
						<table id='lista' bordercolor=0FFFF class='table table-bordered text-center'>
							  <thead class='thead-inverse'>
							  <tr bgcolor='#333333' text color ='#FFFFFF' >									
									<th class='text-left'><FONT COLOR=FFFFFF>Arquivo</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Nome</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Descrição</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Versão</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Vizualizar Arquivo</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Deletar Arquivo</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Analise do Arquivo</th>
									<th class='text-left'><FONT COLOR=FFFFFF>Download do Arquivo</th>
								</tr>
							</thead>
							
							";

                    while ($dados = mysql_fetch_array($resultado)) {
                        $Codigo = $dados['Codigo'];
                        $class = "text-left";
                        $nome = mysql_real_escape_string($dados['Nome']);
                        $desc = mysql_real_escape_string($dados['DescricaoUser']);
                        $arquivo = $dados['NmArquivo'];
                        $versao = $dados ['Versao'];

                        $result = $api->scanFile("backup/$arquivo");
                        $scanId = $api->getScanID($result);

                        $relatorio = $result->permalink;

                        //$report = $api->getFileReport($result->sha256);
                        if ($result->response_code == 1) {
                            $string = "<p> <font text-align='center' color='green'>Análise Completada</font></p><p><a href=$relatorio target='_blank'>Verificar análise</a></p>";
                        } else {

                            if ($result->response_code == -3) {
                                $string = "<p> <font text-align='center' color='green'>Arquivo Seguro</font></p>";
                            } else {
                                $string = "<p> <font text-align='center' color='green'>Arquivo Seguro</font></p>";
                            }
                        }


                        echo "
					<tbody class='table table-bordered' style='text-align:center'>
					<tr>
					
					<td class='$class'>" . $dados['NmArquivo'] . "</td>
					<td >" . $nome . "</td>
					<td class='$class'>" . $desc . "</td>
					<td >" . $versao . "</td>
					<td class='$class'><form id=upload action=ver_arquivo.php?codigo=$Codigo&c3RhdHVz=$status enctype=multipart/form-data method=post target=_blank><input class='btn btn-success' type=submit value=Vizualizar arquivo></form></td>			
					<td class='$class'><form id=upload action=delArqSel1.php?codigo=$Codigo enctype=multipart/form-data method=post><input class='btn btn-danger' type=submit value='  Deletar  '></form></td>
					<td class='$class'>" . $string . "</td>
					<td class='$class'><a href='backup/" . $arquivo . "' download>download</a></form></td>
					</tr>";
                    }
                    ?>
                    </tbody>		
                    </table>
                    <div class="text-center">
                        <p><input class="btn btn-primary text-center" type="button" value="Voltar"   onClick="history.go(-1)"></p>
                    </div>
                    </pre>

                    <br><br>
                    <script src="http://code.jquery.com/jquery-latest.js"></script>
                    <script src="js/bootstrap.min.js"></script>

                    <script type="text/javascript">
                        function click() {
                            if (event.button == 2 || event.button == 3) {
                                oncontextmenu = 'return false';
                                alert('Todos os direitos reservados');
                            }
                        }
                        document.onmousedown = click
                        document.oncontextmenu = new Function("return false;")</script>


                <?php else : ?>
                    <p>
                        <span class="error"><div class="alert alert-warning" role="alert"><font color="orange">Você não tem autorização para acessar esta página.</span> Por favor <a href="login.php">login</a></div>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    

    <footer class="col-md-12" style="padding-top: 80px">
        <nav class="navbar navbar-default navbar-fixed-bottom">
            <div class="container-fluid">
                <div id="bs-example-navbar-collapse-1">
                    <p class="navbar-text text-center">Copyright &copy; Copyright Website 2017 - EasyCloud Team </p>
                </div>
            </div>
        </nav>
    </footer>
</body>




</html>
