<?php 
	require_once("model/pacientes.model.php");
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");
	
	if (isUserAdmin()){
		header("Location: login.php");
		exit;	
	}
	if (isUserAnonimo()){
		header("Location: login.php");
		exit;	
	}
	?>


<?php 
	// Iniciação das variáveis obrigatórios na vista:
	$tituloPagina = "Criar Paciente";
	$operacao = "I";
	$data = array();
	$msgErros = array();
	$dadosSubmetidos= false;


	if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
		$dadosSubmetidos= true;
		$data = $_POST;
		$msgErros = validarPaciente($data["nomeP"], $data["moradaP"], $data["snsP"], $data["dataNascimP"]);

		if (count($msgErros)>0){
			$msgGlobal= "Existem valores inválidos no formulário";
			$tipoMsgGlobal = "A";
		}
		else {
			$novoID = inserirPaciente($data["nomeP"], $data["moradaP"], $data["snsP"], $data["dataNascimP"]);
			//echo " ----1";
			if ($novoID!=-1){
				$_SESSION["flash_msgGlobal"] = "O paciente foi criada com sucesso";
				$_SESSION["flash_tipoMsgGlobal"] = "S";
				header("Location: pacientes_show.php?id=$novoID");
							
			}
			else {
				$msgGlobal= "Houve um problema ao criar o paciente";
				$tipoMsgGlobal = "E";
			}						
		}
	}

	require("view/pacientes_form.view.php");
