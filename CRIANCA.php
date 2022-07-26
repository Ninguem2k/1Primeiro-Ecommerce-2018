
<?PHP
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "siki";

//Criar a conexao
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>SIKI-CRIANÇA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/templatemo.css">
        <link rel="stylesheet" href="assets/css/custom.css">

        <!-- Load fonts style after rendering the layout styles -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">

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
                                        <a class="nav-link" href="CRIANCA.php">Crianças</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="ADULTO.php">Adultos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="MELHOR_IDADE.php">Melhor idade</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="conatct.php">Contato</a>
                            </li>
                        </ul>
                    </div>
                
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
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
                <form action="BUSCA.php" method="POST" class="modal-content modal-body border-0 p-0">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="inputModalSearch" name="Search" placeholder="Search ...">
                        <button type="submit" name="busca" class="input-group-text bg-success text-light">
                            <i class="fa fa-fw fa-search text-white"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <!--PHP-VISUALIZAR-PAGINAÇÃO-->
        <?php
//        $id_categoria = '0';
//        $id_sub_categoria = '1';
        $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
        //Selcionar todas as empresas da tabela
        $result_empresa = "SELECT TITULO FROM produtos WHERE CRIANÇA = '1'";
//        $result_empresa = "SELECT TITULO FROM produtos WHERE HOMEM = '$id_categoria' AND CRIANÇA = '$id_sub_categoria'";
        $resultado_empresa = mysqli_query($conn, $result_empresa);

        //Contar o total de empresas
        $total_empresas = mysqli_num_rows($resultado_empresa);

        //Setar quantidade de empresas por pagina
        $qnt_result_pg = 9;

        //Calcular o inicio da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        //Selecionar as empresas a serem apresentado na página
        $result_empresas = "SELECT * FROM produtos WHERE   CRIANÇA = '1' LIMIT $inicio, $qnt_result_pg";
//        $result_empresas = "SELECT * FROM produtos WHERE HOMEM = '$id_categoria' AND CRIANÇA = '$id_sub_categoria' LIMIT $inicio, $qnt_result_pg";
        $resultado_empresas = mysqli_query($conn, $result_empresas);
        //************* INICIO PAGINAÇÂO **************/
        //Qunatidade de paginas
        $quantidade_pg = ceil($total_empresas / $qnt_result_pg);

        //Limite de link antes e depois 
        $MaxLinks = 1;
        ?>		
        <!--FIM-PHP-VISUALIZAR-PAGINAÇÃO-->




        <!-- Start Content -->
        <div class="container py-5">
            <div class="row">
                <div class="row">
                    <?php
                    while ($row_usuario = mysqli_fetch_assoc($resultado_empresas)) {
                        ?>
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="<?= $row_usuario['LINK_AFILIADO'] ?>">
                                    <img src="CRUD/<?= $row_usuario['IMAGEM'] ?>" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li>
                                            <?PHP
                                            $V = $row_usuario['AVALIAÇÃO'];
                                            $X = $V - 5;
                                            for ($I = 0; $I < $V; $I++) {
                                                ?>
                                                <i class="text-warning fa fa-star"></i>
                                                <?PHP
                                            }
                                            for ($P = 0; $P > $X; $P--) {
                                                ?>
                                                <i class="text-muted fa fa-star"></i>
                                                <?PHP
                                            }
                                            ?>         
                                        </li>
                                        <li class=" text-dark  text-right">R$<?= $row_usuario['VALOR'] ?></li>
                                    </ul>
                                    <a href="<?= $row_usuario['LINK_AFILIADO'] ?>" class="h2 text-decoration-none text-dark"><?= $row_usuario['TITULO'] ?></a>
                                    <p class="card-text">
                                        <?= $row_usuario['DESCRIÇÃO'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>


                        <?php
                    }
                    ?>
                </div>
            </div>

            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item">
                        <a class="page-link active rounded-0 mr-2 shadow-sm border-top-0 border-left-0" href="CRIANCA.php?pagina=1" tabindex="-1">Primeira</a>
                    </li>

                    <?php
                    for ($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++) {
                        if ($iPag >= 1) {
                            echo '   '
                            . '<li '
                            . 'class = "page-item"><a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="CRIANCA.php?pagina=', $iPag, '">', $iPag, '</a>'
                            . '</li> ';
                        }
                    }
                    ?>
                    <li class="page-item">
                        <?php
                        echo ' <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">', $pagina, '</a>'
                        ?>
                    </li>                        


                    <?php
                    for ($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++) {
                        if ($dPag <= $quantidade_pg) {
                            echo '   '
                            . '<li '
                            . 'class = "page-item"><a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="CRIANCA.php?pagina=', $dPag, '">', $dPag, '</a>'
                            . '</li> ';
                        }
                    }
                    ?>

                    <li class="page-item">
                        <?php
                        echo '<a class="page-link active rounded-0 mr-2 shadow-sm border-top-0 border-left-0 " href="CRIANCA.php?pagina= ', $quantidade_pg, ' " tabindex="-1">Ultimo</a>';
                        ?>
                    </li>              
                </ul>
            </div>
        </div>
    </div>
    <!-- End Content -->

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
                        <li><a class="text-decoration-none" href="CRIANCA.php">Crianças</a></li>
                        <li><a class="text-decoration-none" href="ADULTO.php">Adultos</a></li>
                        <li><a class="text-decoration-none" href="MELHOR_IDADE.php">Melhor idade</a></li>
                        <li><a class="text-decoration-none" href="conatct.php">Contato</a></li>
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
                    <form action="CRIANCA.php" name="enviar" method="POST">
                        <label class="sr-only" for="subscribeEmail"> Endereço de Email</label>
                        <div class="input-group mb-2">
                            <input type="email"  name="email" class="form-control bg-dark text-white border-light" id="subscribeEmail" placeholder="Email address">
                            <button type="submit" name="enviar" class="input-group-text btn-success text-light">Inscrever-se</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </footer>
        <?php
        include_once 'connect/connection.php';
        if (isset($_POST['enviar'])) {
            $value1 = $_POST['email'];
            $query = "INSERT INTO new_email(GMAIL) VALUES ('{$value1}')";
            $conexao = connect();
            $conexao->query($query);
            echo '<script>alert("ENVIADO!!!!!")</script>';
        }
        ?>

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