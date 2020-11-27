<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';

sec_session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="shortcut icon" href="../world.png" type="image/x-icon" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="styles/main.css" />
    </head>
      
    <body style="padding-top: 70px">
	  <?php  if (login_check($mysqli) == true) :  ?>
        <div class="col-lg-2 col-sm-2"></div>
        <div class="col-lg-8 col-sm-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Cadastro</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>Os nomes de usuários devem conter apenas dígitos, letras maiúsculas e minúsculas e underlines (“_”)</li>
                        <li>Emails devem seguir um formato válido para email.</li>
                        <li>As senhas devem ter no mínimo 6 caracteres.</li>
                        <li>As senhas devem conter
                            <ul>
                                <li>Pelo menos uma letra maiúscula (A..Z)</li>
                                <li>Pelo menos uma letra minúscula (a..z)</li>
                                <li>Pelo menos um número (0..9)</li>
                            </ul>
                        </li>
                        <li>Sua senha deve conferir exatamente</li>
                    </ul>
                    <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                          method="post" 
                          name="registration_form">
                        <div class="input-group" style="padding-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1">Nome </span>
                            <input id='username' name="username" size="100" maxlength="99" type="text" class="form-control" placeholder="Nome de usuário" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="input-group" style="padding-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1">E-mail </span>
                            <input id="email" name="email" size="100" maxlength="99" type="text" class="form-control" placeholder="E-mail" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="input-group" style="padding-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1">Senha </span>
                            <input id="password" name="password" size="100" maxlength="99" type="password" class="form-control" placeholder="Senha" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="input-group" style="padding-bottom: 10px">
                            <span class="input-group-addon" id="basic-addon1">Confirmar senha </span>
                            <input id="confirmpwd" name="confirmpwd" size="100" maxlength="99" type="password" class="form-control" placeholder="Confirme a sua senha" aria-describedby="basic-addon1" required="">
                        </div>
                        <div class="text-center">
                            <input class="btn btn-lg btn-primary" type="button" value="Cadastrar" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" /> 
                        </div>
                    </form> 
                   
                    <p>Ir para a <a href="index.php">página principal</a>.</p>
                </div>
            </div>            
        </div>
        <div class="col-lg-2 col-sm-2"></div>
		 <?php  else :  ?>
                    <p>
                        <span class="error"><div class="alert alert-warning" role="alert"><font color="orange">Você não tem autorização para acessar esta página.</span> Por favor <a href="index.php">login</a></div>
                    </p>
                    <?php  endif;  ?>
    </body>
</html>
