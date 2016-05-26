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

            <label for="name">Userame</label>
            <p id="name" class="form-control-static"><?php echoValue("name", $data);?></p>
        </div>    
    </div>    
    <div class='col-xs-12'>    
        <div class="form-group">
            <label for="password">Password</label>
            <p id="password" class="form-control-static"><?php echoValue("password", $data);?></p>
        </div>    
    </div>
    <div class='col-xs-4'>    
        <div class="form-group">
            <label for="type">Tipo Conta</label>
            <p id="type" class="form-control-static"><?php echoValue("type", $data);?></p>
        </div>      
    </div>
    <div class='col-xs-12'>    
        <div class="form-group">
            <label for="nome">Nome</label>
            <p id="nome" class="form-control-static"><?php echoValue("nome", $data);?></p>
        </div>    
    </div>    
    <div class='col-xs-12'>    
        <div class="form-group">
            <label for="morada">Morada</label>
            <p id="morada" class="form-control-static"><?php echoValue("morada", $data);?></p>
        </div>    
    </div>    
    <div class='col-xs-4'>    
        <div class="form-group">
            <label for="sns">SNS</label>
            <p id="sns" class="form-control-static"><?php echoValue("sns", $data);?></p>
        </div>      
    </div>
    <div class='col-xs-4'>    
        <div class="form-group">
            <label for="dataNascimento">Data de Nascimento</label>
            <p id="dataNascimento" class="form-control-static"><?php echoValue("dataNascimento", $data);?></p>
        </div>      
    </div>    
    <div class='col-xs-12 text-center'> 
        <a class="btn btn-info" href="utilizadores.php" role="button">Lista Utilizadores</a>
        <a class="btn btn-primary" href="utilizador_update.php?id=<?php echo $data["id"];?>" role="button">Alterar Utilizador</a>
        <br>
        <br>
    </div>
</div>  
