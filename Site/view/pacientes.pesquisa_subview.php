
<fieldset>
    <legend>Listar Pacientes</legend>
	<table class="table table-bordered">
		<thead>
	  		<tr>
				<th>Nome</th>
				<th>Morada</th>
				<th>SNS</th>
				<th>Data Nascimento</th>
			</tr>	 	
		</thead>		  
		<tbody>
		 	<?php
		 		
		 		foreach ($pacientes as $linha) {
					echo "\n<tr>";
					echo "<td>".$linha['nomeP']."</td>";
					echo "<td>".$linha['moradaP']."</td>";
					echo "<td>".$linha['snsP']."</td>";
					echo "<td>".$linha['dataNascimP']."</td>";
					
					?>
					<?php echo '<td><a class="btn btn-primary" href="pacientes_update.php?id='.$linha['id'].'" role="button">Alterar</a></td>';?>
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
	<div class="dropdown"><label>Número de Pacientes por Página
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    20
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">30</a></li>
    <li><a href="#">50</a></li>
    <li><a href="#">100</a></li>
  </ul>
</div>
	<hr>
</fieldset>
