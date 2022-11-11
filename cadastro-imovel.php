<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link href="css/font-awesome.min.css"  rel="stylesheet" type="text/css">
        <link href="css/bootstrapp.css"  rel="stylesheet" type="text/css">
    </head>
    
    <body>

    <?php 
        require("controller/CasaDAL.php");

        $casaDAL = new CasaDAL();
		
		if(isset($_GET['edit']))
		{
			$casa = $casaDAL->listaPorID($_GET['edit']);
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
                            <a href="index.php" style="text-align:center"><span  class="glyphicon glyphicon-search"></span><p>PESQUISAR</p></a>
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
					<br>
                        <h1 class="text-center text-primary"><?php echo(isset($_GET['edit']))? "Alteração" : "Cadastro" ?> de imóveis</h1>
                    </div>
					</div>
				</div>
				<div class="col-md-12">
                        <ul class="breadcrumb text-center">
                            </li>
                            <li class="active">Cadastro</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
					<div class="panel panel-primary">
				    <div class="panel-heading">Cadastro</div>
				    <div class="panel-body">
                
                        <!--<div class="alert alert-danger alert-dismissable" style="display: none;">
                            <button contenteditable="false" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <p class="text-center">
                                <strong>Erro!</strong>Preencha os campos corretamente.</p>
                        </div>-->
                        <form role="form" class="text-left" action="insere-imovel.php" method="GET" >
                            <div class="col-md-12 form-group text-left has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Título do anúncio</label>
                                <input class="form-control" name="titulo" id="exampleInputPassword1" required placeholder="Título do Anúncio" type="text" value="<?php echo(isset($casa))? $casa->titulo : "" ?>"> <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-12 has-feedback">
                                <label class="control-label" for="exampleInputEmail1" style="color: gray;">Descrição do anúncio</label>
                                <input class="form-control" name="descricao" id="exampleInputEmail1" required placeholder="Descrição do anúncio" type="text" value="<?php echo(isset($casa))? $casa->descricao : "" ?>">                               <span class="fa fa-check form-control-feedback"></span>
                            </div>
							<div class="form-group col-md-12 has-feedback">
                                <label class="control-label" for="exampleInputEmail1" style="color: gray;">Nome do proprietário</label>
                                <input class="form-control" name="proprietario" id="exampleInputEmail1" required placeholder="Nome do proprietário" type="text" value="<?php echo(isset($casa))? $casa->proprietario : "" ?>">                               <span class="fa fa-check form-control-feedback"></span>
                            </div>
							<div class="form-group col-md-12 has-feedback">
                                <label class="control-label" for="exampleInputEmail1" style="color: gray;">Email do proprietário</label>
                                <input class="form-control" name="email" id="exampleInputEmail1" required placeholder="Email do proprietário" type="email" value="<?php echo(isset($casa))? $casa->email : "" ?>">                               <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Telefone</label>
                                <input class="form-control" name="telefone" id="exampleInputPassword1" required value="<?php echo(isset($casa))? $casa->telefone : "" ?>"
                                placeholder="Telefone" type="tel">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-6 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Endereço</label>
                                <input class="form-control" name="endereco" id="exampleInputPassword1" required value="<?php echo(isset($casa))? $casa->endereco : "" ?>"
                                placeholder="Nome da rua do imóvel" type="text">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Número</label>
                                <input class="form-control" name="numero" id="exampleInputPassword1" required="true" placeholder="Número do imóvel" value="<?php echo(isset($casa))? $casa->numero : "" ?>">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Estado</label>
                                <select class="form-control" name="estado" id="exampleInputPassword1" required value="<?php echo(isset($casa))? $casa->estado : "" ?>"
                                placeholder="Telefone" type="text">
                                    <option>SP</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Cidade</label>
                                <input class="form-control" name="cidade" id="exampleInputPassword1" required placeholder="Nome da cidade" value="<?php echo(isset($casa))? $casa->cidade : "" ?>"
                                type="text">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Bairro</label>
                                <input class="form-control" name="bairro" id="exampleInputPassword1" required placeholder="Nome do bairro" value="<?php echo(isset($casa))? $casa->bairro : "" ?>"
                                type="text">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">CEP</label>
                                <input class="form-control" name="cep" id="exampleInputPassword1"required placeholder="CEP do endereço" value="<?php echo(isset($casa))? $casa->cep : "" ?>"
                                type="text">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-2 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Valor</label>
                                <input class="form-control" name="valor" id="exampleInputPassword1" required placeholder="Valor do imóvel" value="<?php echo(isset($casa))? $casa->valor : "" ?>"
                                type="text">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Área</label>
                                <input class="form-control" name="area" id="exampleInputPassword1" required placeholder="Área em metros quadrados do imóvel" value="<?php echo(isset($casa))? $casa->area : "" ?>"
                                type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Tipo</label>
                                <select class="form-control" name="tipo" id="exampleInputPassword1" required placeholder="Nome do bairro" value="<?php echo(isset($casa))? $casa->tipo : "" ?>"
                                type="text">
                                    <option>Casa</option>
                                    <option>Apartamento</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Número de quartos</label>
                                <input class="form-control" name="num_quartos" id="exampleInputPassword1" value="<?php echo(isset($casa))? $casa->num_quartos : "" ?>"
                                placeholder="Número de quartos" type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Número de WCs</label>
                                <input class="form-control" name="num_wc" id="exampleInputPassword1" value="<?php echo(isset($casa))? $casa->num_wc : "" ?>"
                                placeholder="Número de banheiros" type="text">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Número de sítes</label>
                                <input class="form-control" name="num_suites" id="exampleInputPassword1" value="<?php echo(isset($casa))? $casa->num_suites : "" ?>"
                                placeholder="Número de suítes" type="text">
                            </div>
							<div class="form-group col-md-2 has-feedback">
                                <label class="control-label" for="exampleInputPassword1" style="color: gray;">Vagas</label>
                                <input class="form-control" name="vagas" id="exampleInputPassword1" placeholder="Vagas na garagem" value="<?php echo(isset($casa))? $casa->vagas : "" ?>"
                                type="text">
                                <span class="fa fa-check form-control-feedback"></span>
                            </div>
							<input type="hidden" name="id" value="<?php echo(isset($_GET['edit']) ? $casa->id : "") ?>">
                            <hr>
                            <div style="margin-left: auto; margin-right: auto; width: 300px;">
                                <button type="submit" class="btn btn-success" style="align: center;" style="color: white;" title='Inserir imóvel' data-mensagem='tooltip'  data-placement='top'>GRAVAR</button>
                                <a href="index.php" type="submit" class="btn btn-danger" title='Cancelar cadastro' data-mensagem='tooltip'  data-placement='top'>CANCELAR</a>
                                <a href="cadastro-imovel.php" type="submit" class="btn btn-warning" title='Limpar campos' data-mensagem='tooltip'  data-placement='top'>LIMPAR</a>
                            </div>
                        </form>
                    </div>
					</div>
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
		
		<script type="text/css">
			$(function () {
			  $('[data-mensagem="tooltip"]').tooltip()
			})
		</script>
    </body>
</html>