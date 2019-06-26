

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
			    <?php
require 'conexao/db.php';

if(!empty($_GET['securitetoken'])){
    $token = $_GET['securitetoken'];
    
    $sql = "SELECT * FROM usuario_token WHERE hash = :hash AND used = 0 AND expirado_em >NOW()";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":hash", $token);
    $sql->execute();
    
    if($sql->rowCount() > 0) {
        $sql = $sql->fetch();
        $id = $sql['id_usuario'];
        
        if(!empty($_POST['senhalogin'])) {
            $senha = $_POST['senhalogin'];
            
            $sql = "UPDATE loginsistem SET senhalogin = :senhalogin WHERE id = :id";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":senhalogin", ($senha));
            $sql->bindValue(":id", $id);
            $sql->execute();
            
            $sql = "UPDATE usuario_token SET used = 1 WHERE hash = :hash";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":hash", $token);
            $sql->execute();
             echo '<center><div class="alert alert-success" id="foo">Sua senha foi alterada com sucesso ! <br> Volta para área de Login: <br><br> <a href="https://www.copynorte.site" class="btn btn-primary"><span class="icon-arrow-left"></span> Login</a></div></center>';
            exit;
        }
?> 

				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="POST">
						<div class="module-head">
							<h3>Mudar Senha</h3>
						</div>
						
						<div class="module-body">
						
		
								    
							<div class="control-group">
								<div class="controls row-fluid">
								    <div class="alertlogin">
					
<?php 
//if (isset($_SESSION['messageSucesso'])) {
  //echo $_SESSION['messageSucesso'];
  //unset($_SESSION['messageSucesso']);
//}
?>
</div>
									<input class="span12" name="senhalogin" type="password" id="inputPassword" placeholder="Senha" required>
								</div>
							</div>
						
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right">Salvar</button>
								</div>
							</div>
					
					</form>
					
				</div>
				<?php
    }else{
        echo '<center><div class="alert alert-danger" id="foo"><strong>OPS!</strong> Token expirado ou inválido ! <br>Voltar para pagina de login: <br><br><a href="https://www.copynorte.site" class="btn btn-primary"><span class="icon-arrow-left"></span> Voltar</a></div></center>';
        exit;
    }
  }
?>
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
