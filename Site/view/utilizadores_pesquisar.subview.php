 <?php  require_once("model/autenticacao.model.php") ?> 
  <?php  require_once("model/utilizadores.model.php") ?>
  
	<table class="table">
		<thead>
	  		<tr>
				<th>Username</th>
				<th>Tipo de Conta</th>
				<th>Estado</th>
				<th>Nome</th>
				<th>Morada</th>
				<th>SNS</th>
				<th>Data de Nascimento</th>
				<?php if (isUserAdmin()): ?>
					<th></th>
					<th></th>
				<?php endif; ?>
			</tr>	 	
		</thead>		  
		<tbody>
		 	<?php
		 	
		 		foreach ($utilizadores as $linha) {
					echo "\n<tr>";
					echo "<td>".$linha['name']."</td>";
					//echo "<td>".$linha['type']."</td>";
					if ($linha['type'] == "A")
						echo "<td>Admin</td>";
					if ($linha['type'] == "R")
						echo "<td>Recepcionista</td>";
					if ($linha['type'] == "M")
						echo "<td>Médico</td>";
					if ($linha['type'] == "E")
						echo "<td>Enfermeiro</td>";
					
					if ($linha['active'] == "1")
						echo "<td>Activa</td>";
					else
					 	echo "<td>Inactiva</td>";
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".$linha['morada']."</td>";
					echo "<td>".$linha['sns']."</td>";
					echo "<td>".$linha['dataNascimento']."</td>";
					
					
	?>
				
	<?php if (isUserAdmin()): ?>
					<?php echo '<td><a class="btn btn-primary" href="utilizadores_update.php?id='.$linha['id'].'" role="button">Alterar</a></td>';?>

					
					<?php echo '<td><a class="btn btn-danger" href="utilizadores_suspender.php?id='.$linha['id'].'" role="button">Alterar Estado</a></td>';?>
				
						

					</tr>
				<?php endif; ?>
		    <?php } ?>	

		   <hr>
			<a class="btn btn-info" href="utilizadores.php" role="button">Voltar à lista de Utilizadores</a>
			<hr> 
		</tbody>
	</table>
