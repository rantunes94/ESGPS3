<?php require_once("inc/viewUtils.php"); ?>

<?php if (isset($msgGlobal)) : ?>

	<div class="<?php echoAlertClass($tipoMsgGlobal);?>">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		<strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
	</div>
<?php endif; ?>  


    <form action="utilizadores_suspender.php" method="post" class="form">
	
	<br>
	<div class="form-group">
		<div <?php echoClassformGroup('id',$msgErros,$dadosSubmetidos);?>>
			<label for="idid"></label> 
			<input TYPE="hidden" id="idid" name="id" readonly="readonly"<?php echoFieldValue("id", $data) ?> class="form-control">
			<?php echoMsgErro("id", $msgErros) ?>
		</div>
	</div>	
	<br>		
	<div class="form-group">
		<div <?php echoClassformGroup('active',$msgErros,$dadosSubmetidos);?>>
			<label for="idActive">Estado(1 ativo/0 inactivo)</label> 
			<input type="text" id="idActive" name="active"<?php echoFieldValue("active", $data) ?> class="form-control">
			<?php echoMsgErro("active", $msgErros) ?>
		</div>
	</div>	
			
 <div class='col-xs-12 text-center'> 
            <input type="reset" id="idReset" value="Limpar" class="btn btn-warning">  
            <input type="submit" id="idSubmit" value="Alterar Estado" class="btn btn-primary"> 
  
        </div>
        <br>
        <br>
        <br>
</form>
