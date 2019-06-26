<?php
require '../testebeta/conexao/db.php';
session_start();

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){


if(isset($_POST['nome']) && empty($_POST['nome']) == false){
    $data = date('d/m/Y', strtotime($_POST['data'])); 
    $nome = addslashes($_POST['nome']);
    $valor = addslashes($_POST['valor']);
    $copias = addslashes($_POST['copias']);
    $descricao = addslashes($_POST['descricao']);

    $sql = "INSERT INTO anotacoesprof SET data = '$data', nome = '$nome', valor = '$valor', copias = '$copias', descricao = '$descricao'";
    $pdo->query($sql);

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
                            <!--/.module-->
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Adicionar
</button><p></p>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class=" row-fluid" method= "POST">
                <div class="control-group">
                                            <label class="control-label" for="basicinput">Data</label>
                                            <div class="controls">
                                                <input type="date" name = "data" id="basicinput" placeholder="Nome" class="span8" autocomplete="off" required>
                                            </div>
                                        </div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nome</label>
											<div class="controls">
												<input type="text" name = "nome" id="basicinput" placeholder="Nome" class="span8" autocomplete="off" required>
											</div>
                                        </div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Valor R$</label>
											<div class="controls">
												<input type="text" name = "valor" onKeyUp="mascaraMoeda(this, event)" id="basicinput" placeholder="Valor" class="span4" autocomplete="off" required>
                                            </div>
                                        </div>    
                                            <div class="control-group">
											<label class="control-label" for="basicinput">Total de copias</label>
											<div class="controls">
												<input type="text" name="copias" id="basicinput" placeholder="Copias" class="span8" autocomplete="off" required>
											</div> 
										</div>
									<div class="form-group">
  <label for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
                                        
        </div>    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  
  
                            <div class="module">
                                    <div class="module-head">
                                        <h3>Anotações</h3>
                                        <h3><?php echo $dado['id']; ?></h3>
                                    </div>
      
                        <div class="module-body">   
                            <table class="datatable-1 table table-bordered table-striped	 display">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Data</th>
                                    <th>Professor</th>
                                    <th>R$ (Valor)</th>
                                    <th>Copias</th>
                                    <th>Descrição</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
    $sql = "SELECT * FROM anotacoesprof";
    $sql = $pdo->query($sql);
    if($sql->rowCount() > 0){
        foreach($sql->fetchAll() as $usuario){
            echo '<tr>';
            echo '<td>'.$usuario['id'].'</td>';
            echo '<td>'.$usuario['data'].'</td>';
            echo '<td>'.$usuario['nome'].'</td>';
            echo '<td>R$ '.$usuario['valor'].'</td>';
            echo '<td><strong>'.$usuario['copias'].'</strong></td>';
            echo '<td>'.$usuario['descricao'].'</td>';
            echo '<td><center><a class="btn btn-info" href="editar.php?id='.$usuario['id'].'">Editar</a> <a class="btn btn-danger" href="excluir.php?id='.$usuario['id'].'">Excluir</a></center></td>';
           // echo '<td><center><a class="btn btn-danger" href="excluir.php?id='.$usuario['id'].'">Excluir</a></center></td>';
            echo '</tr>';
        }
    }
    ?>
                                </tbody>
                              </table>

                            </div>
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
 <?php
}else{

     header("Location:login.php");
}
 ?>