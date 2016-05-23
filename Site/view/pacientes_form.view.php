<?php require_once("inc/viewUtils.php"); ?>

<?php if (isset($msgGlobal)) : ?>



	<div class="<?php echoAlertClass($tipoMsgGlobal);?>">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
	</div>
<?php endif; ?>  

	<fieldset>
    <legend>Criar Paciente</legend>
	<form action="pacientes_create.php" method="post" class="form-inline">
	  		
	<div class="form-group">
		<div <?php echoClassformGroup('nomeP',$msgErros,$dadosSubmetidos);?>>
			<label for="idNomeP">Nome</label> 
			<input type="text" id="idNomeP" name="nomeP"<?php echoFieldValue("nomeP", $data) ?> class="form-control">
			<?php echoMsgErro("nomeP", $msgErros) ?>
		</div>
	</div>	
	<br><br>
	<div class="form-group">
		<div <?php echoClassformGroup('moradaP',$msgErros,$dadosSubmetidos);?>>
			<label for="idmoradaP">Morada</label>
			<input type="text" id="idmoradaP" name="moradaP"<?php echoFieldValue("moradaP", $data) ?> class="form-control">
			<?php echoMsgErro("moradaP", $msgErros) ?>
		</div>
	</div>
	<br><br>	
	<div class="form-group">
		<div <?php echoClassformGroup('snsP',$msgErros,$dadosSubmetidos);?>>
			<label for="idsnsP">SNS</label>
			<input type="text" id="idsnsP" name="snsP"<?php echoFieldValue("snsP", $data) ?> class="form-control">
			<?php echoMsgErro("snsP", $msgErros) ?>
		</div>
	</div>	
	<br><br>
	<div class="form-group" >
		<div <?php echoClassformGroup('dataNascimP',$msgErros,$dadosSubmetidos);?>>
			<label for="iddataNascimP">Data de Nascimento</label>
			<input type="text" placeholder="yyyy-mm-dd" id="iddataNascimP" name="dataNascimP"<?php echoFieldValue("dataNascimP", $data) ?> class="form-control">
			<?php echoMsgErro("dataNascimP", $msgErros) ?>
		</div>
	</div>				
	<br><br>
	<input type="reset" id="idReset" value="Limpar Pacientes" class="btn btn-warning">
	<?php if($operacao=="I") : ?>	

	<input type="submit" id="idSubmit" value="Criar Paciente" class="btn btn-primary">		
<?php endif; ?> 


</form>
<br>

<a href="pacientes_pesquisar.php" class="btn btn-default" role="button">Pesquisar Paciente</a>
<button type="button" class="btn btn-default">Ver Medicação</button>
<button type="button" class="btn btn-default">Adicionar Medicação</button>
<button type="button" class="btn btn-default">Ver Exames</button>
<button type="button" class="btn btn-default">Alterar Exames</button>

<fieldset>
	<br>
		<br>
	