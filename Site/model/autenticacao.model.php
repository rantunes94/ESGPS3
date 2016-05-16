<?php
require_once("inc/db.php");


// Verifica as credenciais (username e password) de um determinado utilizador.
// Devolve o userID se for válido
// ou -1 se as credenciasi não forem válidas
function verificarCredenciais($username, $Senha){
    try {    

        $query= "SELECT id, password from users where (name= ?) and (active=1)";
        $stmt = db()->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($userID, $PasswordBD);
        //Se consulta não devolver linhas (user ID não existe):
        if (!$stmt->fetch())
            throw new Exception("Não existe o username ou está desativado");
        //Se senha incorreta:
        if (!password_verify($Senha, $PasswordBD))
            return -1;
    } catch (Exception $e) {
        return -1;
    } 
    return $userID;
}

// Verifica se a senha de um determinado utilizador é válida
// Devolve true se senha está correta
// caso contrário, devolve false 
function verificarSenha($userid, $Senha){
    try {    
        $query= "SELECT password from users where id= ?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("i",$userid);
        $stmt->execute();
        $stmt->bind_result($PasswordBD);
        //Se consulta não devolver linhas (user ID não existe):
        if (!$stmt->fetch())
            throw new Exception("Não existe o UserID");
        //Se senha incorreta:
        if (!password_verify($Senha, $PasswordBD))
            return false;
    } catch (Exception $e) {
        return false;
    } 
    return true;
}

// Altera a senha de um determinado utilizador
// Devolve true se alterou corretamente
// Devolve false se não alterou
function alterarSenha($userid, $NovaSenha){
    try {    
        $query= "UPDATE users set password=? where id=?";
        $stmt = db()->prepare($query);
        $hash = password_hash($NovaSenha, PASSWORD_DEFAULT);
        $stmt->bind_param("si", $hash, $userid);
        $stmt->execute();
        return $stmt->affected_rows == 1;
    } catch (Exception $e) {
        return false;
    } 
}



// Verifica se as credenciais username/senha são válidas.
// Devolve NULL se as credenciais forem inválidas
// Se as credenciais forem válidas, devolve um array com 
// informação sobre o utilizador (e aluno se for caso disso)
function getUserInfoFromCredenciais($username, $senha){
    try {
        $userID = verificarCredenciais($username, $senha);
        if ($userID<0)
            throw new Exception("Credenciais inválidas");
        $query= "SELECT id, name, type, active ".
                "FROM users WHERE id=?"; 
        $stmt = db()->prepare($query);
        $stmt->bind_param("i",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    } catch (Exception $e) {
        return array();        
    }        
}



// Usar apenas durante o desenvolvimento da aplicação
// Não usar em produção
// Vai alterar a senha de TODOS os utilizadores 
// Devolve o total de senhas alteradas (-1 se houver erros)
function resetAllSenhas($novaSenha){
    try {
        db()->autocommit(false);

        $query= "select id from users";
        $stmt = db()->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $todosUsers = $result->fetch_all(MYSQL_ASSOC);
        $stmt->close();
        
        $totalAlteradas= 0;
        $query= "UPDATE users set password=? where id = ?";
        $stmt = db()->prepare($query);
        foreach($todosUsers as $rowUser){  
            $hash = password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmt->bind_param("si", $hash,  $rowUser["id"]);
            $stmt->execute();
            $totalAlteradas+= $stmt->affected_rows;
        }
        db()->commit();
    } catch (Exception $e) {
        $totalAlteradas= -1;
        db()->rollback();
    } 
    db()->autocommit(true);
    return $totalAlteradas;
}

// Função de validação dos campos do formulário de login
function validarLogin($username, $senha){
    $arrayMensagens = array();

    if (trim($username)=="")
        $arrayMensagens["name"] = "Username é obrigatório";

    if (trim($senha)=="")
        $arrayMensagens["password"] = "Senha é obrigatória";

    return $arrayMensagens; 
}

// Função de validação dos campos do formulário para alterar senha
function validarChangePassword($senhaAtual, $novaSenha1, $novaSenha2){
    $arrayMensagens = array();

    if (trim($senhaAtual)=="")
        $arrayMensagens["senhaAtual"] = "Senha atual é obrigatória";

    if (trim($novaSenha1)=="")
        $arrayMensagens["novaSenha1"] = "Nova senha é obrigatória";

    if (trim($novaSenha2)=="")
        $arrayMensagens["novaSenha2"] = "Confirmação da nova senha é obrigatória";
    else
        if ($novaSenha1 != $novaSenha2)
            $arrayMensagens["novaSenha2"] = "Confirmação da nova senha não é igual à nova senha";

    return $arrayMensagens; 
}

function isUserLogged(){
    return isset($_SESSION['UserInfo']);
}

function isUserAnonimo(){
    return !isUserLogged();
}

// function isUserAdmin(){
//     if (isset($_SESSION['UserInfo']))
//         return $_SESSION['UserInfo']['type']=='ADM';
//     return false;
// }

function isUserAdmin(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo']['type']=='A';
    return false;
}

function isUserFunc(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo']['type']=='F';
    return false;
}

function isUserEnf(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo']['type']=='E';
    return false;
}

function isUserRec(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo']['type']=='R';
    return false;
}

function isUserDou(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo']['type']=='D';
    return false;
}


function getUserInfo(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo'];
    return array();
}

function getUserID(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo']['userid'];
    return -1;
}

