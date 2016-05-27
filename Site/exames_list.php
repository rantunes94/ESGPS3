<?php 
	require_once("model/exames.model.php");
	require_once("model/pacientes.model.php");
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");

	if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}
	
	$nome = "";
	$observacoes = "";
	$paciente_id = $_GET["id"];

		if (empty($_POST)) { // Formulário não foi submetido - é um pedido GET
		$data = NULL;
		if (isset($_GET["id"])) 
			$data = obtemPaciente($_GET["id"]);
		if ($data == NULL) {
			header("Location: notFound.php");
			exit;
		}
	}
   
	if (isset($_GET['nome']))
		$nome =$_GET['nome'];

	if (isset($_GET['observacoes']))
		$observacoes = $_GET['observacoes'];

	if (isset($_GET['paciente_id']))
		$paciente_id = $_GET['paciente_id'];



	$exames = listarExame($paciente_id);

	// Variáveis usadas pelo do template
	$tituloPagina = "Lista de Exames";

	require("view/top.template.php");
	require("view/exame_form_list.php");
	require("view/bottom.template.php");
