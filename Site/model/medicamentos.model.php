<?php

require_once("inc/db.php");
require_once("inc/dbUtils.php");

function FilterMedicamentos($nome){
	$query = "SELECT id, nome, nome_generico, generico , preco".
			" FROM medicamento".
			"  WHERE (nome like ?)";

	$nome= "%$nome%";
	$stmt= db()->prepare($query);
	$stmt->bind_param("s", $nome);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}


function obtemMedicamento($id)
{
	$query = "SELECT id, nome, nome_generico, generico, preco ".
	         "FROM medicamento ".
	         "WHERE id=?";
	$stmt= db()->prepare($query);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$result = $stmt->get_result();
	$arrayFromDB= $result->fetch_all(MYSQL_ASSOC);
	if (count($arrayFromDB) != 1)
		return NULL;
	else
		return $arrayFromDB[0];
}