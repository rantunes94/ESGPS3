<?php 
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/utilizadores.model.php");

	if (!isUserAdmin()){
		header("Location: login.php");
		exit;	
	}
	
	
	$name = "";
	$type= "";
	$active= 0;
	$nome = "";
	$morada= "";
	$sns = 0;
	$dataNascimento = "";
	
  

	if (isset($_GET['name']))
		$nome =$_GET['name'];

	if (isset($_GET['type']))
		$nome =$_GET['type'];

	if (isset($_GET['active']))
		$nome =$_GET['active'];
	
	if (isset($_GET['nome']))
		$nome =$_GET['nome'];

	if (isset($_GET['morada']))
		$nome =$_GET['morada'];

	if (isset($_GET['sns']))
		$nome =$_GET['sns'];

	if (isset($_GET['dataNascimento']))
		$data_nascimento = $_GET['dataNascimento'];

 	$utilizadores = filterUtilizadoresNome($nome);

	// Variáveis usadas pelo do template
	$tituloPagina = "Lista de Utilizadores";

	require("view/top.template.php");
	require("view/utilizadores_form.view2.php");
	require("view/utilizadores.subview.php");
	require("view/bottom.template.php");
