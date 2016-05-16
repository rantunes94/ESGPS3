<?php require_once("inc/viewUtils.php"); ?>

<?php if (isset($msgGlobal)) : ?>



	<div class="<?php echoAlertClass($tipoMsgGlobal);?>">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
	</div>
<?php endif; ?>  

    
	<form action="utilizadores_create.php" method="post" class="form-inline">
	  		
	<div class="form-group">
		<div <?php echoClassformGroup('nome',$msgErros,$dadosSubmetidos);?>>
			<label for="idNome">Nome</label> 
			<input type="text" id="idNome" name="nome"<?php echoFieldValue("nome", $data) ?> class="form-control">
			<?php echoMsgErro("nome", $msgErros) ?>
		</div>
	</div>	
	<br><br>
	<div class="form-group">
		<div <?php echoClassformGroup('morada',$msgErros,$dadosSubmetidos);?>>
			<label for="idmoradaP">Morada</label>
			<input type="text" id="idmorada" name="morada"<?php echoFieldValue("morada", $data) ?> class="form-control">
			<?php echoMsgErro("morada", $msgErros) ?>
		</div>
	</div>
	<br><br>
		<div class="form-group">
		<div <?php echoClassformGroup('sns',$msgErros,$dadosSubmetidos);?>>
			<label for="idSns">SNS</label>
			<input type="text" id="idSns" name="sns"<?php echoFieldValue("sns", $data) ?> class="form-control">
			<?php echoMsgErro("sns", $msgErros) ?>
		</div>
	</div>
	<br><br>
	<div class="form-group" >
		<div <?php echoClassformGroup('dataNascimento',$msgErros,$dadosSubmetidos);?>>
			<label for="idDataNascimento">Data de Nascimento</label>
			<input type="text" placeholder="yyyy-mm-dd" id="idDataNascimento" name="dataNascimento"<?php echoFieldValue("dataNascimento", $data) ?> class="form-control">
			<?php echoMsgErro("dataNascimento", $msgErros) ?>
		</div>
	</div>		
	<br><br>
	
	
		<div class="form-group">
		<div <?php echoClassformGroup('name',$msgErros,$dadosSubmetidos);?>>
			<label for="iName">Username</label>
			<input type="text" id="idName" name="name"<?php echoFieldValue("name", $data) ?> class="form-control">
			<?php echoMsgErro("name", $msgErros) ?>
		</div>
	</div>
	<br><br>
	<div class="form-group">
		<div <?php echoClassformGroup('password',$msgErros,$dadosSubmetidos);?>>
			<label for="idPassword">Password</label>
			<input type="text" id="idPassword" name="password"<?php echoFieldValue("password", $data) ?> class="form-control">
			<?php echoMsgErro("password", $msgErros) ?>
		</div>
	</div>	
	<br><br>
		<div class="form-group">
		<div <?php echoClassformGroup('type',$msgErros,$dadosSubmetidos);?>>
			<label for="idType">Tipo Conta</label>
			<input type="text" placeholder="A/M/R/E" id="idType" name="type"<?php echoFieldValue("type", $data) ?> class="form-control">
			<?php echoMsgErro("type", $msgErros) ?>
		</div>
	</div>
	<br><br>
			
	
	<input type="reset" id="idReset" value="Limpar Utilizador" class="btn btn-warning">
	<?php if($operacao=="I") : ?>	

	<input type="submit" id="idSubmit" value="Criar Utilizador" class="btn btn-primary">		
<?php endif; ?> 


</form>
<br>



	<br>
		<br>
	