<?php require_once("inc/viewUtils.php"); ?>

<?php if (isset($msgGlobal)) : ?>

	<div class="<?php echoAlertClass($tipoMsgGlobal);?>">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
	</div>
<?php endif; ?>  


    <form action="pacientes_update.php" method="post" class="form">
	

	<div class="form-group">
		<div <?php echoClassformGroup('id',$msgErros,$dadosSubmetidos);?>>
			<label for="idid"></label> 
			<input TYPE="hidden" id="idid" name="id" readonly="readonly"<?php echoFieldValue("id", $data) ?> class="form-control">
			<?php echoMsgErro("id", $msgErros) ?>
		</div>
	</div>			
	<div class="form-group">
		<div <?php echoClassformGroup('nomeP',$msgErros,$dadosSubmetidos);?>>
			<label for="idNomeP">Nome</label> 
			<input type="text" id="idNomeP" readonly="readonly" name="nomeP"<?php echoFieldValue("nomeP", $data) ?> class="form-control">
			<?php echoMsgErro("nomeP", $msgErros) ?>
		</div>
	</div>	
	<div class="form-group" >
		<div <?php echoClassformGroup('moradaP',$msgErros,$dadosSubmetidos);?>>
			<label for="idmoradaP">Morada:</label>
			<input type="text" id="idmoradaP" readonly="readonly" name="moradaP"<?php echoFieldValue("moradaP", $data) ?> class="form-control">
			<?php echoMsgErro("moradaP", $msgErros) ?>
		</div>
	</div>	
	<div class="form-group">
		<div <?php echoClassformGroup('sns',$msgErros,$dadosSubmetidos);?>>
			<label for="idsnsP">SNS</label>
			<input type="text" id="idsnsP" readonly="readonly" name="snsP"<?php echoFieldValue("snsP", $data) ?> class="form-control">
			<?php echoMsgErro("snsP", $msgErros) ?>
		</div>
	</div>	
	<div class="form-group">
		<div <?php echoClassformGroup('dataNascimP',$msgErros,$dadosSubmetidos);?>>
			<label for="iddataNascimP">Data Nascimento</label>
			<input type="text" id="iddataNascimP" readonly="readonly" placeholder="yyyy-mm-dd" name="dataNascimP"<?php echoFieldValue("dataNascimP", $data) ?> class="form-control">
			<?php echoMsgErro("dataNascimP", $msgErros) ?>
		</div>
	</div>
	<br>				
 <div class='col-xs-12 text-center'> 
 			 <?php echo '<td><a class="btn btn-warning" href="exame.php?id='.$data['id'].'" role="button">Adicionar Exames</a></td>';?>
					
			 <?php echo '<td><a class="btn btn-warning" href="medicacao.php?id='.$data['id'].'" role="button">Adicionar Medicação</a></td>';?>
        </div>
        <br>
        <br>
        <br>
</form>
