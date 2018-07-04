<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
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
        <title>Upload de Arquivos</title>
        <link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link rel="icon" href="world.png" type="image/x-icon" />
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/estilo.min.css" rel="stylesheet">
    </head>
    
    <body style="background-color: #3b5998; padding-top: 70px"> 
        <?php if (login_check($mysqli) == true) : ?>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
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
                            <li ><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp INÍCIO <span class="sr-only">(current)</span></a></li>
                            <li class="active"><a href="home.html"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp UPLOAD DE ARQUIVOS</a></li>
                            <li><a href="listarUsuario.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp ARQUIVOS COMPARTILHADOS</a></li>
                            <li><a href="https://www.survio.com/survey/d/E8L9Y8P4N7H3D2H9Pl" target="_blank"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp FEEDBACK </a></li></li>
                            <li><a href="sobre.php"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp SOBRE</a></li> 
                        </ul>
						<ul class="nav navbar-nav navbar-right">
							<li style="padding-right: 5px"><button type="button" class="btn navbar-btn btn-danger"><a style="color: white" href="includes/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a></li></button>
					  </ul>
                    </div>
                </div>
            </nav>
            <div class="col-lg-3 col-sm-2"></div>
            <div class="container col-lg-6 col-sm-8">                
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <img src="cloudimage.png" width="100">
                        <h1>EasyCloud</h1>
                    </div>                    
                    <div class="panel-body">
                        <div class="alert alert-info" role="alert">Lembre-se de fazer o upload de arquivos confiáveis apenas</div>
                        <form id="upload form-group" action="upload_binario.php" enctype="multipart/form-data" method="post">
                            <div class="input-group" style="padding-bottom: 10px">
                                <span class="input-group-addon" id="basic-addon1">Nome</span>
                                <input name="nome" size="100" maxlength="99" type="text" class="form-control" placeholder="Nome do arquivo" aria-describedby="basic-addon1" required="">
                            </div>
							<div class="input-group" style="padding-bottom: 10px">
                                <span class="input-group-addon" id="basic-addon1">Versão:</span>
                                <input name="versao" size="100" maxlength="99" type="text" class="form-control" placeholder="Exemplo: 1.0" aria-describedby="basic-addon1" required="">
                            </div>
                            <div class="input-group" style="padding-bottom: 10px">
                                <span class="input-group-addon" id="basic-addon1">Descrição</span>
                                <input id="file" name="desc" size="100" maxlength="99" type="text" class="form-control" placeholder="Descrição do arquivo" aria-describedby="basic-addon1" required="">
                            </div>
                            <div style="padding-bottom: 10px">
                                <input class="form-control center btn-primary text-center" name="file"  type="file" required>
                            </div>
                            <div class="text-center">
                                <input id="enviar" name="enviar" class="btn btn-lg btn-success"  type="submit" value="Enviar arquivo">
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
            <div class="col-lg-3 col-sm-2"></div>

            <script>
                var file = document.getElementById("file");
                var enviar = document.getElementById("enviar");
                enviar.addEventListener("click", function (event) {
                if (fileUpload.files.length == 0) {
                alert("Nenhum Arquivo Selecionado");
                        return;
                }
                }
            </script>
            <footer class="col-md-12" style="padding-top: 80px">
                <nav class="navbar navbar-default navbar-fixed-bottom">
                    <div class="container-fluid">
                        <div id="bs-example-navbar-collapse-1">
                            <p class="navbar-text text-center">Copyright © Copyright Website 2017 - EasyCloud Team </p>
                        </div>
                    </div>
                </nav>
            </footer>

            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="js/bootstrap.min.js"></script>

            <script type="text/javascript">
                        function click() {
                        if (event.button == 2 || event.button == 3) {
                        oncontextmenu = 'return false';
                                alert ('Todos os direitos reservados');
                        }
                        }
                document.onmousedown = click
                        document.oncontextmenu = new Function("return false;")
            </script>

        <?php else : ?>
            <p>
                <span class="error"><div class="alert alert-warning" role="alert"><font color="orange">Você não tem autorização para acessar esta página.</span> Por favor <a href="login.php">login</a></div>
            </p>
        <?php endif; ?>

    </body> 
</html>


