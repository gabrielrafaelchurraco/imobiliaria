<!DOCTYPE html>
<html>
    
     <head>
        <meta charset="utf-8">
		<title>Venda de Imóveis</title>
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
		$casas = $casaDAL->listarRecente();
		
		$utils = new Utilidades();
		
		if(isset($_GET['view']))
		{
			$casa = $casaDAL->listaPorID($_GET['view']);
		}else
		{
			header("Location: index.php");
		}
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
                    <a class="navbar-brand" href="#" style="color: #337CBB;"><span><?php echo $nome_logo ?></span></a>
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
                        <h1 class="text-center text-primary">Detalhes do imóvel</h1>
						</div>
						</div>
                    </div>
					<div class="col-md-12">
                        <ul class="breadcrumb text-center">
                          
                            <li class="active">Visualizar Imóveis</li>
                        </ul>
                    </div>
					<div class="col-md-12">
				<div class="panel panel-primary">
				
				 <div class="panel-heading"><?php print($casa->titulo) ?></div>
				
				<div class="panel-body">
				<div class="row">
				<div class="col-md-12">
					<h1 style="text-align: center;"><?php print($casa->titulo) ?></h1>
				</div>
				</div>
				<div class="row">
					<div class="col-md-2"></div>
                    <div class="col-md-4">
                        <img src="img/house.jpg" class="img-responsive">
                    </div>
					
                    <div class="col-md-4">
                        <p><?php print($casa->cidade) ?></p>
						<p><?php print($casa->descricao) ?></p>
							<p>Situada em: <?php print($casa->endereco.", ".$casa->cidade."/".$casa->estado); ?></p>
							<p>Valor: <?php print(Utilidades::floatParaDinheiroBRL($casa->valor)) ?></p>
							<p>Tratar:<?php print($casa->proprietario) ?></p>
							<p>Telefone: <?php print($casa->telefone) ?></p>
							<p>Possui: <?php print($casa->area) ?> metros quadrados, <?php print($casa->vagas) ?> vagas, <?php print($casa->num_suites)?> suites e <?php print($casa->num_wc)?> banheiros</p>
						    <p>Email: <a href="mailto:<?php print($casa->email) ?>" style="text-decoration: none; color: white;"><?php print($casa->email) ?></a></p>
						</ul>
						</div>
						</div>
						</div>
                </div>
            </div>
        </div>
		</div>
        <div class="section section-default">
            <div class="container">
                <div class="row">
					<div class="panel panel-primary">
                    <div class="panel-heading">Outras ofertas exclusivas</div>
					<div class="panel-body">
					
					
					<?php 
					
					//$colunas = 12/count($casas);
					$colunas = 3;
					
					foreach ($casas as $casa) { 
					
					?>
                    <div class='col-md-<?php print($colunas); ?>'>
					<div class="thumbnail">
						<img src="img/default2.png" class="img-responsive">
						<div class="caption">
                        <h3 class="text-center text-default"><?php print($casa->titulo) ?></h3>
                        <p class="text-default"><?php print($casa->descricao)?></p>
						<p><a href="visualiza-imovel.php?view=<?php print($casa->id) ?>" class="btn btn-primary" role="button">VER</a> <a href="mailto:<?php print($casa->email) ?>" class="btn btn-default" role="button">EMAIL</a></p>
						</div>
                    </div>
					</div>
					<?php } ?>
				</div>
                </div>
            </div>
        </div>
        <footer class="section section-primary">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>IMÓVEIS</h1>
                        <p>Seu imóvel rápido e fácil!</p>
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
			function deletar()
			{
				return false;
			}
		</script>
    </body>
</html>