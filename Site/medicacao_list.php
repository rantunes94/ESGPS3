<?php 
	require_once("model/medicacao.model.php");
	require_once("model/pacientes.model.php");
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");

	if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}
	
	$nome = "";
	$observacoes = "";
	$consulta_paciente_id = $_GET["id"];

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

	if (isset($_GET['dose']))
		$dose = $_GET['dose'];

	if (isset($_GET['consulta_paciente_id']))
		$consulta_paciente_id = $_GET['consulta_paciente_id'];



	$medicacao = listarMedicacao($consulta_paciente_id);

	// Variáveis usadas pelo do template
	$tituloPagina = "Lista de Medicacao";

	require("view/top.template.php");
	require("view/medicacao_form_list.php");
	require("view/bottom.template.php");
