<?php require_once("inc/viewUtils.php"); ?>

<?php if (isset($msgGlobal)) : ?>

	<div class="<?php echoAlertClass($tipoMsgGlobal);?>">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
	</div>
<?php endif; ?>  

	<fieldset>
    <legend>Criar Medicacao</legend>
	<form action="medicacao_create.php" method="post" class="form-inline">
	
	<div class="form-group">
		<div <?php echoClassformGroup('id',$msgErros,$dadosSubmetidos);?>>
			<label for="idm_paciente_id"></label> 
			<input TYPE="hidden" id="idpaciente_id" name="m_paciente_id" readonly="readonly"<?php echoFieldValue("id", $data) ?> class="form-control">
			<?php echoMsgErro("m_paciente_id", $msgErros) ?>
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

    <p>Medicacao anteriores:</p>
	
    <?php echo '<td><a class="btn btn-warning" href="medicacao_list.php?id='.$_GET['id'].'" role="button">Ver Medicacao</a></td>';?>
    <br>
    <br>
    <br>
    <br>
    <p>Exames a prescrever:</p>
	<div class="form-group">
		<div <?php echoClassformGroup('nome',$msgErros,$dadosSubmetidos);?>>
			<label for="idNome">Nome da Medicação</label> 
			<input type="text" id="idNome" name="nome"<?php echoFieldValue("nome", $data) ?> class="form-control">
			<?php echoMsgErro("nome", $msgErros) ?>
		</div>
	</div>		
	<br><br>
	<div class="form-group">
		<div <?php echoClassformGroup('dose',$msgErros,$dadosSubmetidos);?>>
			<label for="iddose">Dose da Medicação</label> 
			<input type="text" id="iddose" name="dose"<?php echoFieldValue("dose", $data) ?> class="form-control">
			<?php echoMsgErro("dose", $msgErros) ?>
		</div>
	</div>	
<br><br>
		<div class="form-group">
		<div <?php echoClassformGroup('frequencia',$msgErros,$dadosSubmetidos);?>>
			<label for="idfrequencia">Frequencia da Medicação</label> 
			<input type="text" id="idfrequencia" name="frequencia"<?php echoFieldValue("frequencia", $data) ?> class="form-control">
			<?php echoMsgErro("frequencia", $msgErros) ?>
		</div>
	</div>
	<br><br>
	<input type="reset" id="idReset" value="Limpar dados da Medicacao" class="btn btn-warning">
	<?php if($operacao=="I") : ?>	

	<input type="submit" id="idSubmit" value="Criar Medicacao" class="btn btn-primary">
<?php endif; ?> 
	<br><br>
</form>