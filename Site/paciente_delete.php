<?php 
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	//require_once("model/autenticacao.model.php");

	$deleteOK = false;
	if (!empty($_POST)) 
		if (isset($_POST["id"]))			
			$deleteOK = apagarPaciente($_POST["id"]);

	if ($deleteOK){
		header("Location: pacientes.php");
		exit;			
	}	
	// Variáveis utilizadas pela vista:
	$tituloPagina = "Operação inválida";

	require("view/top.template.php");
	require("view/deleteError.view.php");
	require("view/bottom.template.php");
