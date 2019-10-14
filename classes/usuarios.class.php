<?php


class Usuarios 
{
    public function getTotalUsuarios(){
        global $pdo;

        $sql = $pdo->query("SELECT COUNT(*) as u FROM usuarios");
        $row = $sql->fetch();
        return $row['u'];
    }

    public function cadastrar($nome, $email, $senha, $telefone){
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() == 0) {

            $sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":telefone", $telefone);
            $sql->execute();
            
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $senha){
        global $pdo;
    
        $sql = $pdo->prepare("SELECT id,nome FROM usuarios WHERE email = :email AND senha = :senha");
        $sql->bindValue(":email",$email);
        $sql->bindValue(":senha",md5($senha));
        $sql->execute();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();
            $_SESSION['cLogin'] = $dados;
            return true;
        } else {
            return false;
        }

    }
}

?>