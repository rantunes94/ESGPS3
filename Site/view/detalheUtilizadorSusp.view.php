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
            <label for="active">Estado</label>
            <p id="active" class="form-control-static"><?php echoValue("active", $data);?></p>
        </div>    
    </div>    
    
    <div class='col-xs-12 text-center'> 
        <a class="btn btn-info" href="utilizadores.php" role="button">Lista Utilizadores</a>
    </div>
</div>  
