<?php
require 'conexao/db.php';
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){


$id = 0;
if(isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
}
if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $nome = addslashes($_POST['nome']);
    $valor = addslashes($_POST['valor']);
    $copias = addslashes($_POST['copias']);
    $descricao = addslashes($_POST['descricao']);
    
    $sql = "UPDATE anotacoesprof SET nome = '$nome', valor = '$valor', copias = '$copias', descricao = '$descricao' WHERE id = '$id'";
    $pdo->query($sql);
    
    header("Location: index.php");
    
}
    
    $sql = "SELECT * FROM anotacoesprof WHERE id ='$id'";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0) {
        $dado = $sql->fetch();
}else{
        header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content=";url=http://localhost/anotacoes/" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COPYNORTE</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
            <style>
                textarea{
                    width:60%;
                }
            </style>
            

            <script>
            String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraMoeda(campo,evento){
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "##.###.###,##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
  campo.value = resultado.reverse();
}
            </script>
            

    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">COPYNORTE</a>
                       
                    <!-- /.nav-collapse -->
                    <div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">
					    
                <li><a href="sair.php">
							Sair
						</a></li>
					</ul>
				</div><!-- /.nav-collapse -->

                </div>
                
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="Content-Type">
                <div class="row">
                    <div class="span3">
                        
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                                <!-- <div class="btn-box-row row-fluid">
                                    <a href="#" class="btn-box big span4"><i class=" icon-random"></i><b>65%</b>
                                        <p class="text-muted">
                                            Growth</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-user"></i><b>
                                    
                                    </b>
                                        <p class="text-muted">
                                            New Users</p>
                                    </a><a href="#" class="btn-box big span4"><i class="icon-money"></i><b>15,152</b>
                                        <p class="text-muted">
                                            Profit</p>
                                    </a>
                                </div> -->
                                
                            </div>
                            
<div class="module" style="width:75%;">
                                    <div class="module-head">
                                        <h3>Editar</h3>
                                    </div>
      
                        
                           </div> 

          <form class=" row-fluid" method= "POST">
                <div class="control-group">
                                            <label class="control-label" for="basicinput">Data</label>
                                            <div class="controls">
                                                <input type="text" name = "" value="<?php echo $dado['data']; ?>" id="basicinput" placeholder="Nome" class="span8" autocomplete="off" required disabled>
                                            </div>
                                        </div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nome</label>
											<div class="controls">
												<input type="text" name = "nome" value="<?php echo $dado['nome']; ?>" id="basicinput" placeholder="Nome" class="span8" autocomplete="off" required>
											</div>
                                        </div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Valor R$</label>
											<div class="controls">
												<input type="text" name = "valor" value="<?php echo $dado['valor']; ?>" onKeyUp="mascaraMoeda(this, event)" id="basicinput" placeholder="Valor" class="span4" autocomplete="off" required>
                                            </div>
                                        </div>    
                                            <div class="control-group">
											<label class="control-label" for="basicinput">Total de copias</label>
											<div class="controls">
												<input type="text" name="copias" value="<?php echo $dado['copias']; ?>" id="basicinput" placeholder="Copias" class="span8" autocomplete="off" required>
											</div> 
										</div>
									<div class="form-group">
  <label for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" name="descricao" placeholder="<?php echo $dado['descricao']; ?>" id="exampleFormControlTextarea1" rows="10" cols="15"></textarea>
  </div>
                                        
          
      <div class="modal-footer" style="width:75%;">
        <a href="index.php" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        </div>
      
  
  
                            
                          </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
           </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
               <center><b class="copyright">&copy; 2018 COPYNORTE </b>Todos os direitos reserdos.</center>
            </div>
        </div>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
      
    </body>
</html>
<?php
}else{
    header("Location: login.php");
}
?>