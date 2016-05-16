 <?php  require_once("model/autenticacao.model.php") ?> 
	<table class="table">
		<thead>
	  		<tr>
				<th>Username</th>
				<th>Tipo de Conta</th>
				<th>Activa</th>
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
					echo "<td>".$linha['type']."</td>";
					if ($linha['active'] == "1")
						echo "<td>Sim</td>";
					else
					 	echo "<td>Não</td>";
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".$linha['morada']."</td>";
					echo "<td>".$linha['sns']."</td>";
					echo "<td>".$linha['dataNascimento']."</td>";
					
					


					?>
				<?php if (isUserAdmin()): ?>
					<?php echo '<td><a class="btn btn-primary" href="utilizadores_update.php?id='.$linha['id'].'" role="button">Alterar</a></td>';?>
						<td>
							<form action="#" method="POST">
								<input type="hidden" name="id" value="<?php echo $linha['id'];?>">
								<input type="submit" class="btn btn-danger" role="button" value="Suspender">
							</form>
						</td>
					</tr>
				<?php endif; ?>
		    <?php } ?>	
		</tbody>
	</table>
