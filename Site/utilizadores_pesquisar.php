<?php 
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/utilizadores.model.php");

	if (!isUserAdmin()){
		header("Location: login.php");
		exit;	
	}
	
	$data = array();
	$id="";
	$name = "";
	$type= "";
	$active= 0;
	$nome = "";
	$morada= "";
	$sns = "";
	$dataNascimento = "";
	$utilizadores =array();
	
  

	if (isset($_GET['name']))
		$name =$_GET['name'];

	if (isset($_GET['type']))
		$type =$_GET['type'];

	if (isset($_GET['active']))
		$active =$_GET['active'];
	
	if (isset($_GET['nome']))
		$nome =$_GET['nome'];

	if (isset($_GET['morada']))
		$morada =$_GET['morada'];

	if (isset($_GET['sns']))
		$sns =$_GET['sns'];

	if (isset($_GET['dataNascimento']))
		$data_nascimento = $_GET['dataNascimento'];

 	

 	if ($sns != "")
		$utilizadores = FilterUtilizadoreSNS($sns);


	// Variáveis usadas pelo do template
	$tituloPagina = "Pesquisa de Utilizadores";

	require("view/top.template.php");
	require("view/utilizadores_form.view3.php");
	require("view/utilizadores.subview.php");
	require("view/bottom.template.php");
