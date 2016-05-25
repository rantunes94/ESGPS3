<?php require_once("inc/viewUtils.php"); ?>

<?php if (isset($msgGlobal)) : ?>

	<div class="<?php echoAlertClass($tipoMsgGlobal);?>">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
	</div>
<?php endif; ?>  

	<fieldset>
    <legend>Criar Exame</legend>
	<form action="medicacao_create.php" method="post" class="form-inline">
	
	<div class="form-group">
		<div <?php echoClassformGroup('id',$msgErros,$dadosSubmetidos);?>>
			<label for="idpaciente_id"></label> 
			<input TYPE="hidden" id="idpaciente_id" name="paciente_id" readonly="readonly"<?php echoFieldValue("id", $data) ?> class="form-control">
			<?php echoMsgErro("paciente_id", $msgErros) ?>
		</div>
	</div>	
    	<div class="form-group">
		<div <?php echoClassformGroup('nomeP',$msgErros,$dadosSubmetidos);?>>
			<label for="idnomeP">Nome do Paciente</label> 
			<input TYPE="text" id="idnomeP" name="" readonly="readonly"<?php echoFieldValue("nomeP", $data) ?> class="form-control">
			<?php echoMsgErro("nomeP", $msgErros) ?>
		</div>
	</div>	
    <br><br>

    <p>Exames anteriores:</p>
	
    <?php echo '<td><a class="btn btn-warning" href="exames_list.php?id='.$_GET['id'].'" role="button">Ver Exames</a></td>';?>
    <br>
    <br>
    <br>
    <br>
    <p>Exames a prescrever:</p>
	<div class="form-group">
		<div <?php echoClassformGroup('nome',$msgErros,$dadosSubmetidos);?>>
			<label for="idNome">Nome do Exame</label> 
			<input type="text" id="idNome" name="nome"<?php echoFieldValue("nome", $data) ?> class="form-control">
			<?php echoMsgErro("nome", $msgErros) ?>
		</div>
	</div>		
	<br><br>
	<div class="form-group">
		<div <?php echoClassformGroup('observacoes',$msgErros,$dadosSubmetidos);?>>
			<label for="idobservacoes">Observacoes</label> 
			<input type="text" id="idobservacoes" name="observacoes"<?php echoFieldValue("observacoes", $data) ?> class="form-control">
			<?php echoMsgErro("observacoes", $msgErros) ?>
		</div>
	</div>	
	<br><br>
	<input type="reset" id="idReset" value="Limpar dados de Exame" class="btn btn-warning">
	<?php if($operacao=="I") : ?>	

	<input type="submit" id="idSubmit" value="Criar Exame" class="btn btn-primary">
<?php endif; ?> 
	<br><br>
</form>

	