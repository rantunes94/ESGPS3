<?php
require_once("inc/viewUtils.php")
?>
<form action="pacientes_pesquisar.php" method="get">

<label for="idNomeP">Nome</label> 
<input type="text" id="idNomeP" name="nomeP" value="<?php echo $nomeP; ?>" class="form-control">
<br><br>

<label for="idNomeP">SNS</label> 
<input type="text" id="idSNSP" name="snsP" value="<?php echo $snsP; ?>" class="form-control">
<br><br>

<label for="idNomeP">Data de Nascimento</label> 
<input type="text" id="idDataNascimP" name="dataNascimP" value="<?php echo $dataNascimP; ?>" class="form-control">
<br><br>

<label for="idNomeP">Morada</label> 
<input type="text" id="idMoradaP" name="moradaP" value="<?php echo $moradaP; ?>" class="form-control">
<br>

<input type="submit" id="idSubmit" value="Filtrar" class="btn btn-primary">	

</form>