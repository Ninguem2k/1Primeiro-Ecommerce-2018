<?php
include_once '../connect/connection.php';
$conexao = connect();
$query = ("SELECT * FROM produtos");
$resultSet = $conexao->query($query);
?>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("LOCATION: PHP_LOGAR.php");
    EXIT;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>SIKI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="../assets//img/apple-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/templatemo.css">
        <link rel="stylesheet" href="../assets/css/custom.css">

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">

        <!-- Load map styles -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
        <!--
            
        TemplateMo 559 Zay Shop
        
        https://templatemo.com/tm-559-zay-shop
        
        -->
    </head>

    <body>


        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light shadow">
            <div class="container d-flex justify-content-between align-items-center">

                <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
                    SIKI
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" menu align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                    <div class="flex-fill">
                        <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="about.html">Sobre</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Fazer compras</a>
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="Criaca.html">Crianças</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Adulto.html">Adultos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Melhor_idade.html">Melhor idade</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="CONF-PRODUTO.html">Contato</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
        <!-- Close Header -->

        <!-- Modal -->
        <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="w-100 pt-1 mb-5 text-right">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="get" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                        <button type="submit" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Start Content Page -->
        <div class="container-fluid bg-light py-5">
            <div class="col-md-6 m-auto text-center">
                <h1 class="h1">PRODUTOS</h1>
                <h1 class="h1"><a href="CONF-PRODUTO-CADASTRAR.php">ADICIONAR</a>-<a href="CONF-PRODUTO-ALTERAR.php">ALTERAR</a>-<a href="CONF-PRODUTO-DELETAR.php"ALTERAR>EXCLUIR</a></h1>
            </div>
        </div>

        <!-- Start Contact -->
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($resultSet as $value) {
                    ?>
                    <div class="col-12 col-md-4 mb-4 m-auto ALTERAR ">    
                        <h1 class="text-center"><?= $value['id'] ?></h1>
                        <img src="<?= $value['IMAGEM'] ?>" class="card-img-top" alt="...">            
                        <form name="CADASTRO" enctype="multipart/form-data" action="CONF-PRODUTO-ALTERAR.php" method="POST">
                            <input type="hidden" name="id" value="<?= $value['id'] ?>" /> 

                            <input type="file" id="upload" name="imagens[]" value="" multiple="multiple" /><br>                         
                            <label>LINK_AFILIADO</label>
                            <div class="card text-center text-dark h-100 ">
                                <input type="text" name="LINK_AFILIADO" value="<?= $value['LINK_AFILIADO'] ?>" />
                                <label>AVALIAÇÂO</label> <i class="text-warning fa fa-star"></i>                               
                                <input type="text" name="AVALIAÇÃO" value="<?= $value['AVALIAÇÃO'] ?>" />      
                                <label>VALOR R$</label>
                                <input type="text" name="VALOR" value="<?= $value['VALOR'] ?>" />
                                <label>TITULO</label>
                                <input type="text" name="TITULO" value="<?= $value['TITULO'] ?>" />   
                                <label>DESCRIÇÃO</label>                                         
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                <textarea name="DESCRIÇÃO" rows="4" cols="20">
                                    <?= $value['DESCRIÇÃO'] ?>
                                </textarea>
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-12 text-center text-dark m-auto">
                                        <h5>0 significa que o conteúdo não é destinado para essa faixa etária e 1 significa o contrário</h5>                                                     
                                    </div>
                                    <div class="col-6 col-md-2 mb-4 m-auto">
                                        <h6>CRIANÇA</h6>
                                        <select name="CRIANÇA">
                                            <option>0</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2 mb-4 m-auto">
                                        <h6>ADULTO</h6>
                                        <select name="ADULTO">
                                            <option>0</option>
                                            <option>1</option>
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2 mb-4 m-auto"> 
                                        <h6>MELHO_IDADE</h6>
                                        <select name="MELHOR_IDADE">
                                            <option>0</option>
                                            <option>1</option>   
                                        </select>
                                    </div>
                                    <div class="col-6 col-md-2 mb-4 m-auto"> 
                                        <h6>HOMEM</h6>
                                        <select name="HOMEM">
                                            <option>0</option>
                                            <option>1</option>
                                        </select> 
                                    </div> 
                                    <div class="col-6 col-md-2 mb-4 m-auto"> 
                                        <h6>MULHER</h6>
                                        <select name="MULHER">
                                            <option>0</option>
                                            <option>1</option>
                                        </select> 
                                    </div>                                         
                                </div>
                                <input type="submit" value="Enviar" name="ok" /><br>
                                </form>                                    
                            </div>
                    </div>
                    <?PHP
                }
                ?>
            </div>
        </div>




        <?PHP
        $destino = "IMG-PRODUTOS/";
        if (!is_dir($destino)) {
            echo "Pasta $destino nao existe";
        } else {
            if (isset($_POST['ok'])) {
                $UPIcerto = FALSE;
                $arquivo = isset($_FILES['imagens']) ? $_FILES['imagens'] : FALSE;
                for ($controle = 0; $controle < count($arquivo['name']); $controle++) {
                    $destinodimagem = $destino . $arquivo['name'][$controle];
                    if (move_uploaded_file($arquivo['tmp_name'][$controle], $destinodimagem)) {
                        echo "Upload da imagem realizado com sucesso<br>";
                        $UPIcerto = TRUE;
                    } else {
                        echo "Erro ao realizar upload da imagem";
                    }
                }

                $value[1] = $_POST['TITULO'];
                $value[2] = $_POST['VALOR'];
                $value[3] = $_POST['AVALIAÇÃO'];
                $value[4] = $_POST['DESCRIÇÃO'];
                $value[5] = $destinodimagem;
                $value[6] = $_POST['LINK_AFILIADO'];
                $value[7] = $_POST['CRIANÇA'];
                $value[8] = $_POST['ADULTO'];
                $value[9] = $_POST['MELHOR_IDADE'];
                $value[10] = $_POST['HOMEM'];
                $value[11] = $_POST['MULHER'];
                $id = $_POST['id'];
                $resultado = $resultSet->fetch();
                $query = "UPDATE `produtos` SET `TITULO`='$value[1]',`VALOR`='$value[2]',`AVALIAÇÃO`='$value[3]',`DESCRIÇÃO`='$value[4]',`IMAGEM`='$value[5]',`LINK_AFILIADO`='$value[6]' WHERE id = '$id' ";
                $query = "UPDATE `produtos` SET `TITULO`='$value[1]',`VALOR`='$value[2]',`AVALIAÇÃO`='$value[3]',`DESCRIÇÃO`='$value[4]',`IMAGEM`='$value[5]',`LINK_AFILIADO`='$value[6]',`HOMEM`='$value[7]',`MULHER`='$value[8]',`CRIANÇA`='$value[9]',`ADULTO`='$value[10]',`MELHOR_IDADE`='$value[11]' WHERE id = '$id' ";
                echo '<script>alert("Alterado com sucesso!!!!!")</script>';
                $conexao->query($query);
            } else {
                echo '<script>alert("ERRO!!!!!")</script>';
            }
        }
        ?>

        <!-- End Contact -->

        <!-- Start Footer -->
        <footer class="bg-dark" id="tempaltemo_footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 pt-5">
                        <h2 class="h2 text-success border-bottom pb-3 border-light logo text-center">SIKI</h2>
                        <ul class="list-unstyled text-light text-center footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                Riachinho, MG. Brasil.
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="tel:(38) 999771431">(38) 999771431</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="shopmastertrade@gmail.com">shopmastertrade@gmail.com</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 pt-5">
                        <h2 class="h2 text-light border-bottom pb-3 border-light text-center">Mais informações</h2>
                        <ul class="list-unstyled text-light text-center footer-link-list">
                            <li><a class="text-decoration-none" href="index.html">Home</a></li>
                            <li><a class="text-decoration-none" href="about.html">Sobre</a></li>
                            <li><a class="text-decoration-none" href="Criaca.html">Crianças</a></li>
                            <li><a class="text-decoration-none" href="Adulto.html">Adultos</a></li>
                            <li><a class="text-decoration-none" href="Melhor_idade.html">Melhor idade</a></li>
                            <li><a class="text-decoration-none" href="CONF-PRODUTO.html">Contato</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row text-light mb-4">
                    <div class="col-12 mb-3">
                        <div class="w-100 my-3 border-top border-light"></div>
                    </div>
                    <div class="col-auto me-auto">
                        <ul class="list-inline text-left footer-icons">
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                            </li>
                            <li class="list-inline-item border border-light rounded-circle text-center">
                                <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="subscribeEmail">Endereço de Email</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                            <div class="input-group-text btn-success text-light">Inscrever-se</div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!-- End Footer -->

        <!-- Start Script -->
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/templatemo.js"></script>
        <script src="assets/js/custom.js"></script>
        <!-- End Script -->
    </body>

</html>