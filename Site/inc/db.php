<?php 

function db(){
	global $_ApplicationDBConnection;

	if (isset($_ApplicationDBConnection))
		return $_ApplicationDBConnection;

	$maquina = "localhost";
	$utilizador = "root";
	$senha="";
	$bd="dbis";
	$_ApplicationDBConnection = @new mysqli($maquina, $utilizador, $senha, $bd); 	
	return $_ApplicationDBConnection;
}
