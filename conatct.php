<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>SIKI-CONTATO</title>
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
                                        <a class="nav-link" href="CRIANCA.php">
                                            s</a>
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


        <!-- Start Content Page -->
        <div class="container-fluid bg-light py-5">
            <div class="col-md-6 m-auto text-center">
                <h1 class="h1">Contate-Nos</h1>
            </div>
        </div>

        <!-- Start Contact -->
        <div class="container py-5">
            <div class="row py-5">
                <form class="col-md-9 m-auto" action="conatct.php" method="post" role="form">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputname">Name</label>
                            <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="inputemail">Email</label>
                            <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputsubject">Assunto</label>
                        <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <label for="inputmessage">Message</label>
                        <textarea class="form-control mt-1" id="message" name="message" placeholder="Message" rows="8"></textarea>
                    </div>
                    <div class="row">
                        <div class="col text-end mt-2">
                            <button type="submit" name="enviar" class="btn btn-success btn-lg px-3">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Contact -->
        <?php
        include_once 'connect/connection.php';
        if (isset($_POST['enviar'])) {
            $value1 = $_POST['email'];
            $value2 = $_POST['subject'];
            $value3 = $_POST['name'];
            $value4 = $_POST['message'];
            $query = "INSERT INTO email(GMAIL, ASSUNTO, NOME, MESSAGEM) VALUES ('{$value1}','{$value2}','{$value3}','{$value4}')";
            $conexao = connect();
            $conexao->query($query);
            echo '<script>alert("ENVIADO!!!!!")</script>';
        }
        ?>
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
                    <form action="conatct.php" name="envia" method="POST">
                        <label class="sr-only" for="subscribeEmail"> Endereço de Email</label>
                        <div class="input-group mb-2">
                            <input type="email"  name="email" class="form-control bg-dark text-white border-light" id="subscribeEmail" placeholder="Email address">
                            <button type="submit" name="envia" class="input-group-text btn-success text-light">Inscrever-se</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </footer>
           <?php
        if (isset($_POST['envia'])) {
            $value1 = $_POST['email'];
            $query = "INSERT INTO new_email(GMAIL) VALUES ('{$value1}')";
            $conexao = connect();
            $conexao->query($query);
            echo '<script>alert("ENVIADO!!!!!")</script>';
        }
        ?>


        <!-- Start Script -->
        <script src="assets/js/jquery-1.11.0.min.js"></script>
        <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/templatemo.js"></script>
        <script src="assets/js/custom.js"></script>
        <!-- End Script -->
    </body>

</html>