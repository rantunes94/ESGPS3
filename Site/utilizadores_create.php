<?php 
	require_once("model/utilizadores.model.php");
	require_once("inc/controllerInit.php");
	require_once("model/autenticacao.model.php");
	

	if (!isUserAdmin()){
	header("Location: login.php");
	exit;	
	}
	
?>
<?php 
	// Iniciação das variáveis obrigatórios na vista:
	$tituloPagina = "Criar Utilizador";
	$operacao = "I";
	$data = array();
	$msgErros = array();
	$dadosSubmetidos= false;


	if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
		$dadosSubmetidos= true;
		$data = $_POST;
		$msgErros = validarUtilizador($data["name"], $data["password"], $data["type"],$data["nome"],$data["morada"],$data["sns"], $data["dataNascimento"]);
		if (count($msgErros)>0){
			$msgGlobal= "Existem valores inválidos no formulário";
			$tipoMsgGlobal = "A";
		}
		else {
			$novoID = inserirUtilizador($data["name"], $data["password"], $data["type"],$data["nome"],$data["morada"],$data["sns"], $data["dataNascimento"]);
			//echo " ----1";
			if ($novoID!=-1){
				$_SESSION["flash_msgGlobal"] = "O utilizador foi criada com sucesso";
				$_SESSION["flash_tipoMsgGlobal"] = "S";
				//exit;
				header("Location: utilizador_show.php?id=$novoID");

							
			}
			else {
				$msgGlobal= "Houve um problema ao criar o utilizador";
				$tipoMsgGlobal = "E";
			}						
		}
	}
	
	require("view/top.template.php");
	require("view/utilizadores_form.view.php");
	require("view/bottom.template.php");