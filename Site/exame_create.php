<?php 
	require_once("model/exames.model.php");
	require_once("model/pacientes.model.php");
	require_once("model/autenticacao.model.php");
	require_once("inc/controllerInit.php");
	
	if (!isUserRec()){
		header("Location: login.php");
		exit;	
	}

	// Iniciação das variáveis obrigatórios na vista:
	$tituloPagina = "Criar Exame";
	$operacao = "I";
	$data = array();
	$msgErros = array();
	$dadosSubmetidos= false;

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

		$msgErros = validarExame($data["nome"], $data["observacoes"], $data["paciente_id"]);

		if (count($msgErros)>0){
			$msgGlobal= "Existem valores inválidos no formulário";
			$tipoMsgGlobal = "A";
		}
		else {
			$novoID = inserirExame($data["nome"], $data["observacoes"], $data["paciente_id"]);

			if ($novoID!=-1){
				$_SESSION["flash_msgGlobal"] = "O exame foi criada com sucesso";
				$_SESSION["flash_tipoMsgGlobal"] = "S";

				header("Location: exames_show.php?id=$novoID");
							
			}
			else {
				$msgGlobal= "Houve um problema ao criar o exame";
				$tipoMsgGlobal = "E";
			}						
		}
	}

	require("view/exames_form.view.php");
