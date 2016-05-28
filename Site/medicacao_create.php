<?php 
	require_once("model/medicacao.model.php");
	require_once("model/pacientes.model.php");
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");
	
	if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}

	// Iniciação das variáveis obrigatórios na vista:
	$tituloPagina = "Criar Medicacao";
	$operacao = "I";
	$data = array();
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
	?>

<?php 
	
	if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
		$dadosSubmetidos= true;
		$data = $_POST;


		$msgErros = validarMedicacao($data["nome"], $data["dose"], $data["frequencia"], $data["m_paciente_id"]);

		if (count($msgErros)>0){
			$msgGlobal= "Existem valores inválidos no formulário";
			$tipoMsgGlobal = "A";
		}
		else {
			$novoID = inserirMedicacao($data["nome"], $data["dose"], $data["frequencia"], $data["m_paciente_id"]);

			if ($novoID!=-1){
				$_SESSION["flash_msgGlobal"] = "O medicamento foi criada com sucesso";
				$_SESSION["flash_tipoMsgGlobal"] = "S";

				header("Location: medicacao_show.php?id=$novoID");
							
			}
			else {
				$msgGlobal= "Houve um problema ao criar o medicamento";
				$tipoMsgGlobal = "E";
			}						
		}
	}

	require("view/medicacao_form.view.php");
