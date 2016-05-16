<?php

// Funções para utilizar se for necessário converter um array
// (de strings ou números) para uma string com todos os valores
// dentro de parêntesis - util para gerar SQL com operador in

function stringArrayToInList($mySQLiConnection, $array){
	$lista = "";
	if (isset($array))
		foreach ($array as $elemento) {
			if ($lista == "")
				$lista = "('".$mySQLiConnection->real_escape_string($elemento)."'";  
			else 
				$lista.= ",'" . $mySQLiConnection->real_escape_string($elemento)."'";
		}
	if ($lista != "")
		$lista.= ")";
	else
		$lista= "(NULL)";
	return $lista;
}

function numberArrayToInList($mySQLiConnection, $array){
	$lista = "";
	if (isset($array))
		foreach ($array as $elemento) {
			if ($lista == "")
				$lista = "(".$mySQLiConnection->real_escape_string($elemento);  
			else 
				$lista.= "," . $mySQLiConnection->real_escape_string($elemento);
		}
	if ($lista != "")
		$lista.= ")";
	else
		$lista= "(NULL)";
	return $lista;
}


function keyNumberArrayToInList($mySQLiConnection, $array){
	$lista = "";
	if (isset($array))
		foreach ($array as $key => $elemento) {
			if ($lista == "")
				$lista = "(".$mySQLiConnection->real_escape_string($key);  
			else 
				$lista.= "," . $mySQLiConnection->real_escape_string($key);
		}
	if ($lista != "")
		$lista.= ")";
	else
		$lista= "(NULL)";
	return $lista;
}