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
<?php
header("X-Frame-Options: DENY");
header("Content-Security-Policy: frame-ancestors 'none'", false);
?>
<html>
    <head>
        <title>Sobre</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
       <link rel="icon" href="world.png" type="image/x-icon" />
        <link href="css/meuCss.css" rel="stylesheet">
        <script language='Javascript'> function checartecla(evt) {
                if (evt.keyCode == '17') {
                    alert( & quot; Comando Desativado & quot; ) return false}
                return true
            }</script>
    </head>
    <body style="padding-top: 70px">
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
                            <li><a href="home.php"><span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>&nbsp UPLOAD DE ARQUIVOS</a></li>
                            <li><a href="listarUsuario.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span>&nbsp ARQUIVOS COMPARTILHADOS</a></li>
                            <li><a href="https://www.survio.com/survey/d/E8L9Y8P4N7H3D2H9Pl" target="_blank"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>&nbsp FEEDBACK </a></li></li>
							<li class="active"><a href="sobre.php"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>&nbsp SOBRE</a></li> 
                        </ul>
						<ul class="nav navbar-nav navbar-right">
						<li style="padding-right: 5px"><button type="button" class="btn navbar-btn btn-danger"><a style="color: white" href="includes/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a></li></button>
					</ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <img src="cloudimage.png" width="100">
                        <br>
                        <h1>
                            EasyCloud
                        </h1>
                    </div>                    
                    <div class="panel-body">
                        <div class="col-lg-8 col-sm-12">
                            <h2 class="text-center">Olá</h2>
                            <h3>O sistema EasyCloud foi elaborado no ano de 2017 e tem como objetivo principal, mostrar um sistema prático para que o fluxo de documentos dentro de uma empresa, ocorrendo de forma rápida, fácil e sustentável.</h3>
                            <h3>Comprometidos com a segurança, procuramos fazer com que o usuário analise o arquivo que está disponibilizando na intranet,com o objetivo de não causar possíveis transtornos na organização.
                                </h3>
                            <div class="text-center">
                                <h3><a class="btn btn-primary btn-lg" href="home.php" role="button">Home</a></h3>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12 text-center">
                            <img class="img-rounded" src="home.jpg" width="350">
                        </div>
                    </div>                    
                </div>
            </div>
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
            document.oncontextmenu = new Function("return false;")
            </script>

        <?php else : ?>
            <p>
                <span class="error"><div class="alert alert-warning" role="alert"><font color="orange">Você não tem autorização para acessar esta página.</span> Por favor <a href="login.php">login</a></div>
            </p>
        <?php endif; ?>
        <footer class="col-md-12">
            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container-fluid">
                    <div id="bs-example-navbar-collapse-1">
                        <p class="navbar-text text-center">Copyright © Copyright Website 2017 - EasyCloud Team</p>
                    </div>
                </div>
            </nav>
        </footer>
    </body>
</html>
