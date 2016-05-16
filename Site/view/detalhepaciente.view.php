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

            <label for="NomeP">Nome</label>
            <p id="nomeP" class="form-control-static"><?php echoValue("nomeP", $data);?></p>
        </div>    
    </div>    
    <div class='col-xs-4'>    
        <div class="form-group">
            <label for="moradaP">Morada</label>
            <p id="moradaP" class="form-control-static"><?php echoValue("moradaP", $data);?></p>
        </div>    
    </div>
    <div class='col-xs-4'>    
        <div class="form-group">
            <label for="snsP">SNS</label>
            <p id="snsP" class="form-control-static"><?php echoValue("snsP", $data);?></p>
        </div>      
    </div>
    <div class='col-xs-12'>    
        <div class="form-group">
            <label for="dataNascimP">Data Nascimento</label>
            <p id="dataNascimP" class="form-control-static"><?php echoValue("dataNascimP", $data);?></p>
        </div>    
    </div>        
    <div class='col-xs-12 text-center'> 
        <a class="btn btn-info" href="pacientes.php" role="button">Lista de Clientes</a>
        <a class="btn btn-primary" href="pacientes_update.php?id=<?php echo $data["id"];?>" role="button">Alterar Cliente</a>
    </div>
</div>  
