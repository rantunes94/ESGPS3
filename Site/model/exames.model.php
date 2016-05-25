<?php

require_once("inc/db.php");
require_once("inc/dbUtils.php");



function inserirExame($nome, $observacoes, $paciente_id)
{
	try {
		$query = "INSERT INTO exame (nome, observacoes, paciente_id ) values (?,?,?)";
		$stmt= db()->prepare($query);
		$stmt->bind_param("sss", $nome, $observacoes, $paciente_id);
		//echo "    ----1";
		$stmt->execute();
		//echo "  ----2";
		// Nota: Se o insert correu bem, a propriedade affected_rows deve ter o seguinte valor:
		// 1 - foi inserido um registo
		if (db()->affected_rows !=1)
			throw new Exception("Erro - algo se passou");
		//echo "    ---3";
	} catch(Exception $e) {
		return -1;
	}
	//echo " ----4";
	//exit; 
	return db()->insert_id;
}


function validarExame($nome, $observacoes, $paciente_id){
	$arrayMensagens = array();

	if (trim($nome)=="")
		$arrayMensagens["nome"] = "nome é obrigatório";

		if (trim($observacoes)=="")
		$arrayMensagens["observacoes"] = "observacoes são obrigatório";

		if (trim($paciente_id)=="")
		$arrayMensagens["paciente_id"] = "paciente é obrigatório";

	return $arrayMensagens;	
}

function obtemExame($id)
{
	$query = "SELECT e.id, e.nome, e.observacoes, e.paciente_id, p.nomeP ".
	         "FROM exame e JOIN paciente p ON e.paciente_id=p.id".
	         " where e.id=?";
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


function listarExame($paciente_id)
{
	$query = "SELECT e.nome, e.observacoes, e.paciente_id, p.nomeP ".
	         "FROM exame e JOIN paciente p ON e.paciente_id=p.id ".
	         "WHERE e.paciente_id=?";
	$stmt= db()->prepare($query);
	$stmt->bind_param("i",$paciente_id);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}