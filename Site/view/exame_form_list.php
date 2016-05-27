<?php require_once("inc/viewUtils.php"); ?>

<fieldset>

    <div class="form-group">
		<div>
			<label for="idpaciente_id"></label> 
			<input TYPE="hidden" id="idpaciente_id" name="paciente_id" readonly="readonly"<?php echoFieldValue("id", $data) ?> class="form-control">
		</div>
	</div>	

	<table class="table table-bordered">
		<thead>
	  		<tr>
	  			<th>Nome Paciente</th>
				<th>Nome do Exame</th>
				<th>Observacoes</th>
			</tr>	 	
		</thead>		  
		<tbody>
		 	<?php
		 		foreach ($exames as $linha) {
					echo "\n<tr>";
					echo "<td>".$linha['nomeP']."</td>";
					echo "<td>".$linha['nome']."</td>";
					echo "<td>".$linha['observacoes']."</td>";
				;

				?>
						
					</tr>
				
		    <?php } ?>	
		</tbody>
	</table>
</div>

</fieldset>