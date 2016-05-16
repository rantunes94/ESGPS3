<?php require_once("inc/viewUtils.php"); ?>

<hr>
<a class="btn btn-info" href="utilizadores_create.php" role="button">Novo Utilizador</a>
<hr>
<form action="utilizadores.php" method="get" class="form-inline">	
	<div class="form-group">
		<label for="idNome">Nome</label>
		<input type="text" id="idNome" name="nome" value="<?php echo $nome; ?>" class="form-control">
		</div>			
	<input type="reset" id="idReset" value="Limpar" class="btn btn-warning">	
	<input type="submit" id="idSubmit" value="Filtrar" class="btn btn-primary">	
	
</form>
<br> 