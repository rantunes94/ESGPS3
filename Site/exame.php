<?php 
	require_once("model/exames.model.php");
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");

		if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}
	
	$nome = "";
	$observacoes = "";

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

	if (isset($_GET['observacoes']))
		$observacoes =$_GET['observacoes'];


	
	// Variáveis usadas pelo do template
	$tituloPagina = "Área de Exames";

	require("view/top.template.php");
	require("exame_create.php");
	require("view/bottom.template.php");
