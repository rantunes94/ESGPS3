<?php 
	require_once("model/medicacao.model.php");
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");

		if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}
	
	$nome = "";
	$dose = "";
	$frequencia = "";

	$msgErros = array();
	$dadosSubmetidos= false;

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

	
	// Variáveis usadas pelo do template
	$tituloPagina = "Área de Medicação";

	require("view/top.template.php");
	require("medicacao_create.php");
	require("view/bottom.template.php");
