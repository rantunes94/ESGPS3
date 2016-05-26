<?php require_once("inc/viewUtils.php"); ?>

<hr>
			<a class="btn btn-info" href="utilizadores.php" role="button">Voltar à lista de Utilizadores</a>
			<hr> 


<form action="utilizadores_pesquisar.php" method="get" class="form-inline">

	<div class="form-group">

		
		<label for="idSNS">SNS</label> 
		<input type="text" id="idSNS" name="sns" value="<?php echo $sns; ?>" class="form-control">
		<br><br>


		</div>			
	<input type="reset" id="idReset" value="Limpar" class="btn btn-warning">	
	<input type="submit" id="idSubmit" value="Filtrar" class="btn btn-primary">	
	
</form>
