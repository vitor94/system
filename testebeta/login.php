<?php
require '../testebeta/conexao/db.php';
session_start();
$erro="";
if(isset($_POST['emaillogin']) && empty($_POST['emaillogin']) == false){
    $email = addslashes($_POST['emaillogin']);
    $senha = addslashes($_POST['senhalogin']);

    $sql = "SELECT * FROM loginsistem WHERE emaillogin = '$email' AND senhalogin = '$senha'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        $dado = $sql->fetch();
        $_SESSION['id'] = $dado['id'];

        header("Location: index.php");
    }else{
        $_SESSION['message'] = '<div class="alert alert-danger" id="foo"><strong>OPS!</strong> E-mail e/ou senha errados!</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Coynorte - Copiadora</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
    <style>
        #foo{
            position:relative;
            width:290px;
            left:0px;
        }
        /* .alert{
            width:100px;
        } */
        /* .alertlogin{
            margin:0 auto;
            width:240px;
        } */
    </style>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		COPYNORTE
			  	</a>
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">

				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST">
						<div class="module-head">
							<h3>Login</h3>
						</div>
						
						<div class="module-body">
						
							<div class="control-group">
							    
								<div class="controls row-fluid">
								    <div class="alertlogin">
						<?php 
if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
?>
<?php 
if (isset($_SESSION['messageSucessoSenha'])) {
  echo $_SESSION['messageSucessoSenha'];
  unset($_SESSION['messageSucessoSenha']);
}
?>
</div>
									<input class="span12" name="emaillogin" type="email" id="inputEmail" placeholder="E-mail" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" name="senhalogin" type="password" id="inputPassword" placeholder="Senha" required>
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
							<select class="form-control" id="exampleFormControlSelect1" required>
      <option></option>
      <option>Faculdade Kennedy</option>
    </select>
    </div>
							</div>
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
								    <span><a href="esqueci.php">Esqueci a senha</a></span>
									<button type="submit" class="btn btn-primary pull-right"><span class="icon-lock"></span> Entrar</button>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			</div>
			
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<center><b class="copyright">SEU IP É <?php echo $_SERVER["REMOTE_ADDR"]; ?><br/>&copy; 2018 COPYNORTE </b>Todos os direitos reserdos.</center>
		</div>
	</div>
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script>
        // Iniciará quando todo o corpo do documento HTML estiver pronto.
$().ready(function() {
	setTimeout(function () {
		$('#foo').hide(); // "foo" é o id do elemento que seja manipular.
	}, 8000); // O valor é representado em milisegundos.
});
    </script>
</body>