<?php
require 'conexao/db.php';
if(!empty($_POST['emaillogin'])){
    
    $email = $_POST['emaillogin'];
    
    $sql = "SELECT * FROM loginsistem WHERE emaillogin = :emaillogin";
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":emaillogin", $email);
    $sql->execute();
    
    if($sql->rowCount() > 0){
        
        $sql = $sql->fetch();
        $id = $sql['id'];
        
        $token = md5(time().rand(0, 99999).rand(0, 99999));
        
        $sql = "INSERT INTO usuario_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_usuario", $id);
        $sql->bindValue(":hash", $token);
        $sql->bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
        $sql->execute();
        
        $link = "https://copynorte.site/redefinir.php?securitetoken=".$token;
        
        $mensagem = "Para redefinir sua senha, favor clicar no link que você será redirecionado $link";
        
        // $mensagem = "Clique no link para redefinir sua senha:<br>".$link;
        
        $assunto = "Redefinição de senha";
        
        $headers = 'From: noreply@copynorte.site'."\r\n" .
                    'X-Mailer: PHP/'.phpversion();
        
        mail($email, $assunto, $mensagem, $headers);
        
        $_SESSION['messageSucesso'] = '<div class="alert alert-successo" id="foo">Um e-mail com instruções foi enviado!
Chegará em alguns minutos. <strong>Verifique o SPAM.</strong></div>';
    }else{
        $_SESSION['message'] = '<div class="alert alert-danger" id="foo"><strong>OPS!</strong> E-mail incorreto ou inexistente!</div>';
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
							<h3>Qual é seu email ?</h3>
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
if (isset($_SESSION['messageSucesso'])) {
  echo $_SESSION['messageSucesso'];
  unset($_SESSION['messageSucesso']);
}
?>
</div>
									<input class="span12" name="emaillogin" type="email" id="inputPassword" placeholder="E-mail" required>
								</div>
							</div>
						
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right"><span class="icon-lock"></span> Esqueci a senha</button>
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
