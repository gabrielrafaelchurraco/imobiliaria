<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
		<title><?php echo $nome_site ?></title>
		<link rel="shortcut icon" type="image/png" href="img/home.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/estilo-marco.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrapp.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>

    <?php 
        require("controller/CasaDAL.php");
		require("controller/Utilidades.php");
		
        $casaDAL = new CasaDAL();
		$casas = $casaDAL->listar($_GET['search']);
		
		$utils = new Utilidades();
    ?>
        <div class="navbar navbar-default navbar-default navbar-static-top navbar-fixed-top" style="margim-bottom: 40px; border-top-style: solid; border-top-width: 5px; border-top-color: #337CBB;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #337CBB;"><span><img src="img/home.png" style="height: 60px;" /><?php echo $nome_logo ?></span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="item">
                            <a href="index.php" style="text-align:center"><span class="glyphicon glyphicon-home"></span><p>HOME</p></a>
                        </li>
                        <li class="item">
                            <a href="contato.php" style="text-align:center"><span  class="glyphicon glyphicon-phone-alt"></span><p>CONTATO</p></a>
                        </li>
                        <li class="dropdown item">
                            <a href="#" id="menu-opcoes" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false" style="text-align:center"><span class="glyphicon glyphicon-align-justify"></span><p>OPÇÕES</p></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="cadastro-imovel.php"><i class="glyphicon glyphicon-plus"></i>&nbsp;Novo</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="opcoes.php"><i class="glyphicon glyphicon-cog"></i>&nbsp;Opções</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="../../index.php"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;Ajuda</a>
                                </li>
								<li>
									<a href="contato.php"><span  class=" glyphicon glyphicon-off"></span>&nbsp;Sair</a>
								</li>
                            </ul>
                        </li>
						<li class="item">
                            <a href="" style="text-align:center"><span  class="glyphicon glyphicon-search"></span><p>PESQUISAR</p></a>
                        </li>
						
                    </ul>
                </div>
            </div>
        </div>
			
		
        <div class="section section-success" id="select" name="select" style="background-image: url('img/bk1.jpg'); background-attachment: fixed;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
					<div class="page-header">
					<div class="col-md-12">
                        <h1 class="text-center text-primary">Imóveis a venda</h1>
						</div>
						</div>
                    </div>
					<div class="col-md-12">
                        <ul class="breadcrumb text-center">
                            
                            <li class="active">Imóveis</li>
                        </ul>
                    </div>
                </div>
                    
                
				<div class="panel panel-primary">
				  <div class="panel-heading">Resultado: (<?php print(count($casas)); ?>) imóveis encontrados</div>
				  <div class="panel-body">
                    <div class="col-md-12">
					<?php if(isset($_GET['post'])){?>
					 <div class="alert alert-dismissable alert-<?php print(isset($_GET['post']))? $_GET['post'] : ""?>">
                            <strong>Atenção:</strong><?php print($utils->mensagem($_GET['post'])) ?></div>
					<?php }?>
					<div class="btn-group col-md-3">
						<a href="index.php" title='Início' data-mensagem='tooltip'  data-placement='top' class="btn btn-primary"><span class="glyphicon glyphicon-home"></span></a></li>
						<a href="cadastro-imovel.php" title='Novo' data-mensagen='tooltip'  data-placement='top' class="btn btn-default"><span class="glyphicon glyphicon-asterisk"></span></a></li>
						<a href="index.php?clear=all" title='Limpar' data-mensagem='tooltip'  data-placement='top' class="btn btn-default"><span class="glyphicon glyphicon-erase"></span></a></li>
						<a href="opcoes.php" title='Opções' data-mensagem='tooltip'  data-placement='top' class="btn btn-default"><span class="glyphicon glyphicon-cog"></span></a></li>
						<a href="index.php" title='Recarregar' data-mensagen='tooltip'  data-placement='top' class="btn btn-default"><span class="glyphicon glyphicon-repeat"></span></a></li>
						<a onclick="window.print(); return false;" title='Imprimir' data-mensagem='tooltip'  data-placement='top' class="btn btn-default"><span class="glyphicon glyphicon-print"></span></a></li>
					</div>
					
					<form role="form" action="index.php" method="GET" class="col-md-9">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Título do anúncio ou cidade do imóvel" 
									value="<?php print((isset($_GET['search']))? $_GET['search'] : "") ?>">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" title='Pesquisar imóvel' data-toggle='tooltip'  data-placement='top'>BUSCAR</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="active">#</th>
                                    <th class="active">Título</th>
                                    <th class="active">Proprietário</th>
                                    <th class="active">Valor</th>
                                    <th class="active">Endereço</th>
                                    <th class="active">Data</th>
                                    <th class="active" colspan="4" style="text-align: center;">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
								if(count($casas) > 0){
									foreach ($casas as $casa) {
										print("<tr>");
										print("<td>".$casa->id."</td>");
										print("<td><a href='cadastro-imovel.php?edit=".$casa->id."'>".$casa->titulo."</a></td>");
										print("<td>".$casa->proprietario."</td>");
										print("<td>".Utilidades::floatParaDinheiroBRL($casa->valor)."</td>");
										print("<td>".$casa->endereco."</td>");
										print("<td>".Utilidades::dataParaPtBR($casa->dt_anuncio)."</td>");
										print("<td><a  title='Editar imóvel' data-mensagem='tooltip'  data-placement='top' style='color: white;' href='cadastro-imovel.php?edit=".$casa->id."'  class='btn btn-primary btn-sm' alt='Editar imóvel'><i class='glyphicon glyphicon-pencil'></i></a></td>");
										print("<td><a title='Excluir imóvel' data-toggle='modal' data-mensagem='tooltip' data-target='#meuModal' data-id='".$casa->id."' data-titulo='".$casa->titulo."' data-dono='".$casa->proprietario."'  data-placement='top' style='color: white;' class='btn btn-danger btn-sm' ><i class=' glyphicon glyphicon-remove-sign'></i></a></td>");
										print("<td><a title='Enviar e-mail ao proprietário' data-mensagem='tooltip'  data-placement='top' style='color: white;' href='mailto:".$casa->email."' class='btn btn-warning btn-sm' onclick='javascript:deletar(); return false' ><i class='glyphicon glyphicon-envelope'></i></a></td>");
										print("<td><a title='Visualizar imóvel' data-mensagem='tooltip'  data-placement='top' style='color: white;' href='visualiza-imovel.php?view=".$casa->id."'  class='btn btn-info btn-sm'><i class='glyphicon glyphicon-eye-open'></i></a></td>");
										print("</tr>");
									}
								}
								else
								{
									print("<tr>");
									print("<td class='active' colspan='7'><p style='text-align: center;'>A consulta não retornou nenhum valor</p></td>");
									print("</tr>");
								}
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
		</div>
		</div>
       
	   
		<div class="modal fade  bs-example-modal-sm" id="meuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="border-color: gray;">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content">
			  <div class="modal-header" style="background-color: #337CBB; color: white; text-align: center;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Excluir Imóvel</h4>
			  </div>
			  <div class="modal-body">
				<form>
				  <div class="form-group">
					<label  id="mensagem">A exclusão deste imóvel não poderá ser revertida.</label>
				  </div>
				</form>
			  </div>
			  <div class="modal-footer">
				<form action="exclui-imovel.php" method="GET">
					<input type="hidden" name="remove" id="remove" />
					<button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Excluir</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	   
        <footer class="section section-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h1>IMÓVEIS</h1>
                        <p>Seu imóvel rápido e fácil! com a G iMOBILIARIA</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-info text-right">
							
                            <br>
                            <br>
                        </p>
                    </div>
                </div>
				
            </div>
        </footer>
		<script type="text/javascript">
			$('#meuModal').on('show.bs.modal', function(event){
				var button = $(event.relatedTarget);
				var id = button.data('id');
				var proprietario = button.data('dono');
				var titulo = button.data('titulo');
				
				var modal=$(this);
				modal.find('#exampleModalLabel').text('Excluir imóvel ' + titulo + '?');
				modal.find('#mensagem').text('Deseja realmente excluir o imóvel ' + titulo + ' de ' + proprietario + '?');
				modal.find('#remove').val(id);
				
				
			});
			
			$(function () {
			  $('[data-mensagem="tooltip"]').tooltip()
			})
			
			$('menu-opcoes').mouseout(function(){
				$('menu-opcoes').css('color','blue');
			});
		</script>
    </body>
</html>