<?php

class USUARIO {

    private $pdo;
    public $msgErro = "";

    public function conectar($name, $host, $usuario, $senha) {
        global $pdo;
        try {
            $pdo = new PDO("mysql:dbname=" . $name . ";host=" . $host, $usuario, $senha);
        } catch (PDOException $exc) {
            $msgErro = $exc->getMessage();
        }
    }
    public function logar($gmail,$senha) {
        global $pdo;
        $sql = $pdo->prepare("select * from usuario where gmail = :e AND senha =:s");
        $sql->bindValue(":e", $gmail);
        $sql->bindValue(":s", $senha);
         $sql->execute();
        if ($sql->rowCount() > 0) {
            $dado =$sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
