<?php

require_once("inc/db.php");
require_once("inc/dbUtils.php");

function getInfoUtilizadores(){
	$query = "SELECT name, type, active FROM users ";
	$stmt= db()->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}

function inserirUtilizador($name,$password,$type,$nome,$morada,$sns,$dataNascimento)
{
	try {
		$query = "INSERT INTO users (name,password,type,nome,morada,sns,dataNascimento) values (?,?,?,?,?,?,?)";
		//echo $query;
		//var_dump($query); exit;
		$stmt= db()->prepare($query);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$stmt->bind_param("sssssss",$name,$hash,$type,$nome,$morada,$sns,$dataNascimento);
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



function validarUtilizador($name,$password,$type,$nome,$morada,$sns,$dataNascimento){
	$arrayMensagens = array();


	if (trim($name)=="")
		$arrayMensagens["name"] = "name é obrigatório";
    
    if (trim($password)=="")
		$arrayMensagens["password"] = "password é obrigatório";

	if (trim($nome)=="")
		$arrayMensagens["nome"] = "nome é obrigatório";

	if (trim($type)=="")
		$arrayMensagens["type"] = "Tipo conta é obrigatório";
	else
		if(strtoupper($type)!='A' && strtoupper($type)!='M' && strtoupper($type)!='R' && strtoupper($type)!='E')
		$arrayMensagens["type"] = "O tipo da conta tem que ser A,M,R ou E";
	
	if (trim($morada)=="")
		$arrayMensagens["morada"] = "morada é obrigatória";
	
	if (trim($sns)=="")
			$arrayMensagens["sns"] = "sns é obrigatório";
	else
		if(!preg_match("/^\d{9}+$/",$sns))
			$arrayMensagens["sns"]  = "O sns apenas pode ter 9 digitos ";

	if (trim($dataNascimento)=="")
		$arrayMensagens["dataNascimento"] = "data de nascimento é obrigatório";


	
	return $arrayMensagens;	
}

function obtemUtilizador($id)
{
	$query = "SELECT id,nome,morada,sns,dataNascimento,name,password,type,active".
	         " FROM users ".
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

function obtemUtilizador2($id)
{
	$query = "SELECT id, name,password, type,active, nome, morada, sns, dataNascimento".
	         " FROM users ".
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


function filterUtilizadoresNome($nome){
	$query = "SELECT id, name, type, active, nome, morada, sns, dataNascimento  ".
	         "FROM users ".
			"  WHERE (nome like ?)";

	$nome= "%$nome%";
	$stmt= db()->prepare($query);
	$stmt->bind_param("s", $nome);
	$stmt->execute();
	$result = $stmt->get_result();
	return $result->fetch_all(MYSQL_ASSOC);
}


							
// function alterarUtilizador($name,$password,$type,$active,$nome,$morada,$sns,$dataNascimento,$id)
// {
// 	try {
// 		$query = "UPDATE users SET name=?, password=?, type=?, active=?, nome=?, morada=?, sns=?, dataNascimento=?".	   
// 		        " WHERE id=".$id." ";
// 		        //" WHERE id=?";
// 		$stmt= db()->prepare($query);
// 		$hash = password_hash($password, PASSWORD_DEFAULT);
// 		$stmt->bind_param("ssssivsss", $name,$hash,$type,$active,$nome,$morada,$sns,$dataNascimento);
// 		$stmt->execute();
// 		// Nota: Se o update correu bem, a propriedade affected_rows deve ter os seguintes valores:
// 		// 1 - foi alterado um registo
// 		// 0 - a operação correu bem, mas não foi alterado nada (não afetou nenhum registo)
// 		if ((db()->affected_rows >1) || (db()->affected_rows <0))
// 			throw new Exception("Erro - algo se passou");
// 	} catch(Exception $e) {
// 		return false;
// 	}
// 	return true;
// } 

function alterarUtilizador($name,$password,$type,$nome,$morada,$sns,$dataNascimento,$id)
{
	try {
		$query = "UPDATE users SET name=?, password=?, type=?, nome=?, morada=?, sns=?, dataNascimento=? ".
		         "WHERE id=?";
		$stmt= db()->prepare($query);
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$stmt->bind_param("sssssssi",  $name, $hash, $type, $nome, $morada, $sns, $dataNascimento, $id);
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

function validarUtilizadorSusp($active){
	$arrayMensagens = array();

	if(trim($active)=='1' && trim($active)=='0' )
		$arrayMensagens["active"] = "O estado da conta tem que ser 0(inactiva) ou 1(ativa)";

	return $arrayMensagens;	
}

function suspenderUtilizador($id,$active)
{
	try {
		$query = "UPDATE users SET active=? ".
		         " WHERE id=?";
		$stmt= db()->prepare($query);
		$stmt->bind_param("si",$active, $id);
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