<?php

require_once("inc/db.php");
require_once("inc/dbUtils.php");



function inserirPaciente($nomeP, $moradaP, $snsP, $dataNascimP)
{
	try {
		$query = "INSERT INTO paciente (nomeP, moradaP, snsP, dataNascimP) values (?,?,?,?)";
		$stmt= db()->prepare($query);
		$stmt->bind_param("ssss", $nomeP, $moradaP, $snsP, $dataNascimP);
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


function validarPaciente($nomeP, $moradaP, $snsP, $dataNascimP){
	$arrayMensagens = array();

	if (trim($nomeP)=="")
		$arrayMensagens["nomeP"] = "nome é obrigatório";

	if (trim($moradaP)=="")
		$arrayMensagens["moradaP"] = "morada é obrigatória";

	if (trim($snsP)=="")
		$arrayMensagens["snsP"] = "sns, é obrigatório";
	else
		if(!preg_match("/^\d{9}+$/",$snsP))
			$arrayMensagens["snsP"]  = "O sns, apenas pode ter 9 digitos ";

	if (trim($dataNascimP)=="")
		$arrayMensagens["dataNascimP"] = "data de nascimento é obrigatório";


	return $arrayMensagens;	
}

function listarPaciente($limit){
	$limit=7;
	$query = "SELECT id, nomeP, moradaP, snsP, dataNascimP ".
	         "FROM paciente LIMIT ".$limit."";
	$stmt= db()->prepare($query);
	var_dump($limit);

	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
} 

function obtemPaciente($id)
{
	$query = "SELECT id, nomeP, moradaP, snsP, dataNascimP ".
	         "FROM paciente ".
	         "where id=?";
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


function alterarPaciente($id, $nomeP, $moradaP, $snsP, $dataNascimP)
{
	try {
		$query = "UPDATE paciente SET nomeP=?, moradaP=?, snsP=?, dataNascimP=?".
		         " WHERE id=".$id."";
		$stmt= db()->prepare($query);
		$stmt->bind_param("ssss", $nomeP, $moradaP, $snsP, $dataNascimP);
		$stmt->execute();
		// Nota: Se o update correu bem, a propriedade affected_rows deve ter os seguintes valores:
		// 1 - foi alterado um registo
		// 0 - a operação correu bem, mas não foi alterado nada (não afetou nenhum registo)
		if ((db()->affected_rows >1) || (db()->affected_rows <0))
			throw new Exception("Erro - algo se passou");
	} catch(Exception $e) {
		return false;
	}
	return true;
} 

function apagarPaciente($id)
{
	try {
		$query = "DELETE from paciente WHERE id=?";
		$stmt= db()->prepare($query);
		$stmt->bind_param("i", $id);
		$stmt->execute();
		// Nota: Se o delete correu bem, a propriedade affected_rows deve ter o seguinte valor:
		// 1 - foi apagado um registo
		if (db()->affected_rows !=1)
			throw new Exception("Erro - algo se passou");
	} catch(Exception $e) {
		return false;
	}
	return true;
}

function FilterPacientesNome($nomeP){
	$query = "SELECT id, nomeP, moradaP, snsP, dataNascimP ".
	         "FROM paciente ".
			"  WHERE (nomeP like ?)";

	$nome= "%$nomeP%";
	$stmt= db()->prepare($query);
	$stmt->bind_param("s", $nomeP);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}
function FilterPacientesMorada($moradaP){
	$query = "SELECT id, nomeP, moradaP, snsP, dataNascimP ".
	         "FROM paciente ".
			"  WHERE (moradaP like ?)";

	$nome= "%$moradaP%";
	$stmt= db()->prepare($query);
	$stmt->bind_param("s", $moradaP);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}
function FilterPacientesSNS($snsP){
	$query = "SELECT id, nomeP, moradaP, snsP, dataNascimP ".
	         "FROM paciente ".
			"  WHERE (snsP like ?)";

	$nome= "%$snsP%";
	$stmt= db()->prepare($query);
	$stmt->bind_param("s", $snsP);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}
function FilterPacientesDataNascim($dataNascimP){
	$query = "SELECT id, nomeP, moradaP, snsP, dataNascimP ".
	         "FROM paciente ".
			"  WHERE (dataNascimP like ?)";

	$nome= "%$dataNascimP%";
	$stmt= db()->prepare($query);
	$stmt->bind_param("s", $dataNascimP);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}