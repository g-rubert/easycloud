<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'Ativo';
    header("Location: home.php");
} else {
    $logged = 'Desconectado';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="icon" href="../cloudimage.png" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="world.png" type="image/x-icon" />


        <script language='Javascript'> function checartecla(evt) {
                if (evt.keyCode == '17') {
                    alert( & quot; Comando Desativado & quot; ) return false}
                return true
            }</script>
        <title>Acesso Administrativo</title>
        <link rel="stylesheet" href="styles/main.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body style="padding-top: 80px">
        <?php
        if (isset($_GET['error'])) {
            echo '<font color="white"><p class="error"><div class="alert alert-warning" role="alert">Erro ao fazer o login!</div></p></font>';
        }
        ?>
        <div class="col-lg-3 col-sm-2"></div>
        <div class="col-lg-6 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <img src="../cloudimage.png" width="100">
                    <h1>EasyCloud</h1>
                </div>
                <div class="panel-body">
                    <div class="alert alert-success" role="alert">Acesso Administrativo</div>
                    <form action="includes/process_login.php" method="post" name="login_form">
                        <div class="input-group" style="padding-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1">E-mail </span>
                            <input name="email" size="100" maxlength="99" type="text" class="form-control" placeholder="E-mail cadastrado" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="input-group" style="padding-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1">Senha</span>
                            <input class="form-control" maxlength="99"  size="40"  type="password" name="password" id="password " aria-describedby="basic-addon1" required />
                        </div>
                        <div class="text-center">
                            <input type="button" class="btn btn-lg btn-success" value="Login" onclick="formhash(this.form, this.form.password);" />
                        </div>
                    </form>
                    <div class="alert alert-danger" role="alert">Você está: <?php echo $logged ?>!</div>
                    <p class="text-center">Se você estiver ativo, poderá <a href="includes/logout.php">se desconectar para a sua segurança</a>.</p>
                    <script type="text/javascript">
                        function click() {
                            if (event.button == 2 || event.button == 3) {
                                oncontextmenu = 'return false';
                                alert('Todos os direitos reservados');
                            }
                        }
                        document.onmousedown = click
                        document.oncontextmenu = new Function("return false;")
                    </script>;
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-2"></div>
        <footer class="col-md-12" style="padding-top: 80px">
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

