<?php

require_once("inc/db.php");
require_once("inc/dbUtils.php");


function inserirMedicacao($nome, $dose, $frequencia, $m_paciente_id)
{
	try {
		$query = "INSERT INTO medicamento (nome, dose, frequencia, m_paciente_id) values (?,?,?,?)";
		$stmt= db()->prepare($query);
		$stmt->bind_param("sssi", $nome, $dose, $frequencia, $m_paciente_id);
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

function validarMedicacao($nome, $dose, $frequencia){
	$arrayMensagens = array();

	if (trim($nome)=="")
		$arrayMensagens["nome"] = "nome é obrigatório";

		if (trim($dose)=="")
		$arrayMensagens["dose"] = "doses são obrigatório";

		if (trim($frequencia)=="")
		$arrayMensagens["frequencia"] = "frequencia é obrigatório";

	return $arrayMensagens;	
}

function obtemMedicacao($id)
{
	$query = "SELECT m.id, m.nome, m.dose, m.frequencia, m.m_paciente_id, p.nomeP ".
	         "FROM medicamento m JOIN paciente p ON m.m_paciente_id=p.id".
	         " where m.id=?";
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


function listarMedicacao($m_paciente_id)
{
	$query = "SELECT m.nome, m.dose, m.frequencia, m.m_paciente_id, p.nomeP ".
	         "FROM medicamento m JOIN paciente p ON m.m_paciente_id=p.id ".
	         "WHERE m.m_paciente_id=?";
	$stmt= db()->prepare($query);
	$stmt->bind_param("i",$m_paciente_id);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}