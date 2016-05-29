<?php 
	require_once("model/medicacao.model.php");
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");

	if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}

	// Iniciação das variáveis obrigatórios na vista:
	$tituloPagina = "Detalhes da Medicação";

	// Variáveis que vêm na Sessão
	if (isset($_SESSION["flash_msgGlobal"])){
		$msgGlobal = $_SESSION["flash_msgGlobal"];
		unset($_SESSION["flash_msgGlobal"]);
	}
	if (isset($_SESSION["flash_tipoMsgGlobal"])){
		$tipoMsgGlobal = $_SESSION["flash_tipoMsgGlobal"];
		unset($_SESSION["flash_tipoMsgGlobal"]);
	}



	if (isset($_GET["id"])) {
		$data = obtemMedicacao($_GET["id"]);
		if ($data == NULL) {
			header("Location: notFound.php");
			exit;
		}
	}

	// Variáveis utilizadas pela vista formDisciplina.view.php

	// $tituloPagina (preenchimento obrigatória) - Titulo da página
	// $data (preenchimento obrigatório) - array com os valores dos campos  
				// a chave é igual ao nome do campo
				// o campo escondido "operacao" é sempre preenchido
				// os restantes campos poderão ficar vazios (não foram ainda preenchidos)
	// $msgGlobal (preenchimento opcional) - String com uma mensagem de aviso/erro/sucesso relativa a toda a página
	// $tipoMsgGlobal (preenchimento opcional) - Tipo da mensagem global ($msgGlobal):
			// A - Aviso
			// E - Erro
	 		// I - Informação 
			// S - Sucesso

	require("view/top.template.php");
	require("view/detalhe_medicacao.php");
	require("view/bottom.template.php");
