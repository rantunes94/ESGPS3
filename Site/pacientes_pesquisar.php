<?php 
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");

if (isUserAdmin()){
		header("Location: login.php");
		exit;	
	}
	if (isUserAnonimo()){
		header("Location: login.php");
		exit;	
	}

	$data = array();
	$id="";
	$nomeP = "";
	$moradaP = "";
	$snsP = "";
	$dataNascimP = "";
	$pacientes =array();
   
	if (isset($_GET['nomeP']))
		$nomeP =$_GET['nomeP'];

	if (isset($_GET['moradaP']))
		$moradaP = $_GET['moradaP'];

	if (isset($_GET['snsP']))
		$snsP = $_GET['snsP'];

	if (isset($_GET['dataNascimP']))
		$dataNascimP = $_GET['dataNascimP'];


	if ($nomeP != "")
		$pacientes = FilterPacientesNome($nomeP);


	if ($moradaP != "")
		$pacientes = FilterPacientesMorada($moradaP);


	if ($snsP != "")
		$pacientes = FilterPacientesSNS($snsP);


	if ($dataNascimP != "")
		$pacientes = FilterPacientesDataNascim($dataNascimP);




	// Variáveis usadas pelo do template
	$tituloPagina = "Pesquisar Paciente";

	require("view/top.template.php");
	require("view/pacientes.pesquisa_view.php");
	require("view/pacientes.pesquisa_subview.php");
	require("view/bottom.template.php");
