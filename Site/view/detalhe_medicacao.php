<?php  require_once("inc/viewUtils.php") ?> 

 <?php if (isset($msgGlobal)) : ?>

  <div class="<?php echoAlertClass($tipoMsgGlobal);?>">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
  </div>

<?php endif; ?>  

<div class='row'>
    <div class='col-xs-12'>    
        <div class="form-group">

            <label for="NomeP">Nome do Paciente</label>
            <p id="nomeP" class="form-control-static"><?php echoValue("nomeP", $data);?></p>
        </div>    
    </div>    
    <div class='col-xs-4'>    
        <div class="form-group">
            <label for="nome">Nome da Medicacao</label>
            <p id="nome" class="form-control-static"><?php echoValue("nome", $data);?></p>
        </div>      
    </div>
    <div class='col-xs-12'>    
        <div class="form-group">
            <label for="dose">Dose da Medicacao</label>
            <p id="dose" class="form-control-static"><?php echoValue("dose", $data);?></p>
        </div>    
    </div>
        <div class='col-xs-12'>    
        <div class="form-group">
            <label for="frequencia">Frequencia da Medicacao</label>
            <p id="frequencia" class="form-control-static"><?php echoValue("frequencia", $data);?></p>
        </div>    
    </div>        
    <div class='col-xs-12 text-center'> 
        <a class="btn btn-info" href="pacientes.php" role="button">Voltar à Pagina Principal</a>
    </div>
</div>  
