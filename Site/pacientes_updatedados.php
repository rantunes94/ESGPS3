<?php 
	require_once("model/pacientes.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");

	if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}
	
	// Iniciação das variáveis obrigatórios na vista:
	$tituloPagina = "Dados do Paciente";
	$operacao = "U";
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

	else if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
		$dadosSubmetidos= true;
		$data = $_POST;

		$msgErros = validarPaciente($data["nomeP"], $data["moradaP"], $data["snsP"], $data["dataNascimP"]);
		if (count($msgErros)>0){
			$msgGlobal= "Existem valores inválidos no formulário";
			$tipoMsgGlobal = "A";
		}
		else {
			if (alterarPaciente($data["id"], $data["nomeP"], $data["moradaP"], $data["snsP"], $data["dataNascimP"])) {
				$_SESSION["flash_msgGlobal"] = "O cliente foi alterado com sucesso";
				$_SESSION["flash_tipoMsgGlobal"] = "S";
				
				header("Location: pacientes_show2.php?id=".$data["id"]);
				exit;			
				}
			else {
				$msgGlobal= "Houve um problema ao alterar o cliente";
				$tipoMsgGlobal = "E";
			}
		}
	}

	// Variáveis utilizadas pela vista formDisciplina.view.php

	// $tituloPagina (preenchimento obrigatória) - Titulo da página
	// $operacao (preenchimento obrigatória) - Operação que está a ser realizada (afeta o desenho)
			// I - Insert
			// U - Update
	// $msgErros (preenchimento obrigatória) - array com as mensagens de erro de validação associado a cada campo
				// a chave é igual ao nome do campo
				// O array pode estar vazio - não tem nenhuma mensagem de erro
	// $data (preenchimento obrigatório) - array com os valores dos campos  
				// a chave é igual ao nome do campo
				// o campo escondido "operacao" é sempre preenchido
				// os restantes campos poderão ficar vazios (não foram ainda preenchidos)
	// $dadosSubmetidos (preenchimento obrigatório) - indica se submeteu ou não os dados do formulário

	// $msgGlobal (preenchimento opcional) - String com uma mensagem de aviso/erro/sucesso relativa a toda a página
	// $tipoMsgGlobal (preenchimento opcional) - Tipo da mensagem global ($msgGlobal):
			// A - Aviso
			// E - Erro
	 		// I - Informação 
			// S - Sucesso
	require("view/top.template.php");
	require("view/pacientes_alterar_form.view2.php");
	require("view/bottom.template.php");
