<?php 
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");

		if (isUserAdmin()){
		header("Location: login.php");
		exit;	
	}
	
	$nomeP = "";
	$moradaP = "";
	$snsP = "";
	$dataNascimP = "";
   
	if (isset($_GET['nomeP']))
		$nome =$_GET['nomeP'];

	if (isset($_GET['moradaP']))
		$morada = $_GET['moradaP'];

	if (isset($_GET['snsP']))
		$sns = $_GET['snsP'];

	if (isset($_GET['dataNascimP']))
		$dataNascim = $_GET['dataNascimP'];



 $pacientes = listarPaciente($nomeP, $moradaP, $snsP, $dataNascimP);

	// Variáveis usadas pelo do template
	$tituloPagina = "Página Principal";

	require("view/top.template.php");
	require("view/pacientes.subview.php");
	require("pacientes_create.php");
	require("view/bottom.template.php");
