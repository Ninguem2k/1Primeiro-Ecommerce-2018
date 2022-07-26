<?php
$ttt=header("LOCATION: CONF-PRODUTO-CADASTRAR.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>LOGAR</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid bg-light py-5">
            <div class="col-md-5 m-auto text-center">
                <form class="col-md-9 m-auto" action="PHP_LOGAR.php" method="post" role="form">
                    <div class="form-group col-md-12 mb-6">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="gmail" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12 mb-6">
                        <label for="inputemail">Senha</label>
                        <input type="password" class="form-control mt-1" id="email" name="senha" placeholder="Senha">
                    </div>   
                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" name="enviar" class="btn btn-success btn-lg px-3">Logar</button>
                        </div>
                    </div>
                </form>                        
            </div>
        </div>
    </body>
</html>
<?PHP
require_once 'USUARIO.php';
$u = new USUARIO();
if (isset($_POST['gmail'])) {
    $gmail = addslashes($_POST['gmail']);
    $senha = addslashes($_POST['senha']);
    if (!empty($gmail) && !empty($senha)) {
        $u->conectar("siki", "localhost", "root", "");
        if ($u->msgErro == "") {
            IF ($u->logar($gmail, $senha)) {
                $ttt;
                echo "ok";
            } else {
                echo "Gmail e/ou senha estão incorretos!";
            }
        } else {
            echo "ERRO:" . $u->msgErro;
        }
    } else {
        echo "Prencha todos os campus!";
    }
}
