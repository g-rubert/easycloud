
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
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="shortcut icon" href="../world.png" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content="20;url=logsAdmin1">
        <title>Monitor de acessos </title>
        <script language='Javascript'> function checartecla(evt) {
                if (evt.keyCode == '17') {
                    alert( & quot; Comando Desativado & quot; ) return false}
                return true
            }</script>
    </head>
    <body style="padding-top: 80px; padding-bottom: 900px">
        <?php if (login_check($mysqli) == true) : ?>
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

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li ><a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbspHOME <span class="sr-only">(current)</span></a></li>
                            <li ><a href="home.php"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>&nbspARQUIVOS COMPARTILHADOS</a></li>
                            <li class="active"><a href="logsAdmin1.php"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span>&nbsp Monitor de acessos</a></li></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li style="padding-right: 5px"><button type="button" class="btn navbar-btn btn-danger"><a style="color: white" href="includes/logout.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <p style='text-align:center; margin-left:auto; margin-right:auto;'><b ><img src='../cloudimage.png' width='100'><b>
                                    <h1 class='animated hiding' data-animation='fadeInDown' data-delay='300'>Monitor de acessos EasyCloud</h1>
                                    <div class="panel-body">
                                        <div class="alert alert-success" role="alert">Acesso Administrativo</div> 

                                        <?php
                                        $ip = $_SERVER["REMOTE_ADDR"];

                                        if ($ip == "::1") {
                                            echo "<div class='alert alert-success' role='alert'>Este é o server</div>";
                                        } else {

                                            echo "<div class='alert alert-success' role='alert'>Seu IP interno é :" . $ip . "</div>";
                                        }
                                        ?>

                                        <table id='lista' bordercolor=0FFFF class='table table-bordered table-condensed' style='margin-left:auto; margin-right:auto;' width='80%' width='80%' >
                                            <thead class='thead-inverse'>
                                                <tr>

                                                    <?php
                                                    // Abrir o arquivo de texto


                                                    echo "			
									<tr bgcolor='#333333' text color ='#FFFFFF' >
										
										<th class='text-left'><FONT COLOR=FFFFFF>&nbsp&nbspIP&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp &nbsp&nbspData&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp| &nbsp&nbsp Eventos &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCódigo&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTamanho</th>
										

									</tr>
								</thead>
								
								";


                                                    $file = file("../../../logs/access.log");
                                                    if (count($file) < 10)
                                                        exit;
                                                    for ($i = count($file) - 1; $i >= (count($file) - 50); $i--) {
                                                        $arr[] = $file[$i];
                                                    }

                                                    $j = 0;

                                                    while ($j <= 10) {
                                                        echo "<tr bgcolor='white' textcolor ='#FFFFFF' ><th>";
                                                        print($arr[$j]);
                                                        echo "</th></tr>";
                                                        $j++;
                                                    }
                                                    ?>

                                                </tr>
                                            </thead>


                                        <?php else : ?>
                                            <p>
                                                <span class="error"><div class="alert alert-warning" role="alert"><font color="orange">Você não tem autorização para acessar esta página.</span> Please <a href="index.php">login</a></div>
                                            </p>
                                        <?php endif; ?>
                                </div>
                                </div>
                                </div>
                                <div class="col-lg-1"></div>
                                <footer class="col-md-12">
                                    <nav class="navbar navbar-default navbar-fixed-bottom">
                                        <div class="container-fluid">
                                            <div id="bs-example-navbar-collapse-1">
                                                <p class="navbar-text text-center">Copyright &copy; Copyright Website 2017 - EasyCloud Team</p>
                                            </div>
                                        </div>
                                    </nav>
                                </footer>
                                </body>
                                </html>