<fieldset>
    <legend>Listar Pacientes</legend>
	<table class="table table-bordered">
		<thead>
	  		<tr>
				<th>Nome</th>
				<th>SNS</th>
			</tr>	 	
		</thead>		  
		<tbody>
		 	<?php
		 		foreach ($pacientes as $linha) {
					echo "\n<tr>";
					echo "<td width=300>".$linha['nomeP']."</td>";
					echo "<td>".$linha['snsP']."</td>";
					
					?>
					<?php echo '<td><a class="btn btn-info" href="pacientes_update.php?id='.$linha['id'].'" role="button">Alterar Dados</a></td>';?>
					<?php echo '<td><a class="btn btn-warning" href="pacientes_updatedados.php?id='.$linha['id'].'" role="button">Informação Médica</a></td>';?>
						<td>
							<form action="paciente_delete.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $linha['id'];?>">
								<input type="submit" class="btn btn-danger" role="button" value="Apagar">
							</form>
						</td>
					</tr>
				
		    <?php } ?>	
		</tbody>
	</table>
	<a class="btn btn-info" href="pacientes_pesquisar.php" role="button">Pesquisar Paciente</a>
	 <form action="pacientes.php" method="post" class="form" id="limit" name="limit">
	<label>Número de Pacientes por Página</label>
  <button class="btn btn-default dropdown-toggle" type="button" id="limit value="20" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    20
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="limit" name="limit">
    <li id="limit" name="limit" value="30"><a href="pacientes.php">30</a></li>
    <li id="limit" name="limit" value="50"><a href="pacientes.php">50</a></li>
    <li id="limit" name="limit" value="100"><a href="pacientes.php">100</a></li>
  </ul>


</div>
  <input type="submit" id="idSubmit" value="Alterar Paginacao" class="btn btn-primary">
	<hr>
</form>
</fieldset>