<?php
require "config/conectar.php";
$sql = $conn -> prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql -> execute();
$resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);

?>

buprofeno se utiliza en personas adultas, para tratar dolores leves y moderados de origen dental, dolor de cabeza, dolor post quirúrgico, dolor asociado a afecciones musculoesqueléticas, entre otros. También se utiliza para aliviar procesos inflamatorios de tejidos blandos, para tratar síntomas de la osteoartritis (artrosis) y artritis reumatoide y para disminuir la temperatura en estados febriles.



<!DOCTYPE html>
<html lang= "es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacias EcoProducts</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <strong>Farmacias EcoProducts</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                    <a href="carrito.php" class="btn btn-primary">Carrito</a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://www.farmaciasknop.com/wp-content/uploads/2019/06/propolis-2-1.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Propolis x 60 comprimidos</h5>
                            <p class="card-text">$6.990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://beta.cruzverde.cl/on/demandware.static/-/Sites-masterCatalog_Chile/default/dwe169cf8e/images/large/273441-ibuprofeno-400-mg-20-comprimidos.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Ibuprofeno 400 mg 20</h5>
                            <p class="card-text">$1.192</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://beta.cruzverde.cl/on/demandware.static/-/Sites-masterCatalog_Chile/default/dw64f25aff/images/large/253275-family-set-mascarilla-1-unidad.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Mascarilla Desechable Plana 3 Unidades</h5>
                            <p class="card-text">$990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://beta.cruzverde.cl/on/demandware.static/-/Sites-masterCatalog_Chile/default/dw466eb46c/images/large/31062-mintavit-c-comprimido-100-unidades-acido-ascorbico-100-mg.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Mintavit-C Acido Ascorbico 100 mg 100 Comprimidos</h5>
                            <p class="card-text">$1272</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://beta.cruzverde.cl/on/demandware.static/-/Sites-masterCatalog_Chile/default/dwd66024b2/images/large/265370-acondicionador-manzana-fresh-400-ml.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Shampoo Manzana Fresh 400 mL</h5>
                            <p class="card-text">$2788</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://www.lospingos.cl/dinamicos/productos/1549901979-agua%20oxigenada.png">
                        <div class="card-body">
                            <h5 class="card-title">Agua Oxigenada 10 Volúmenes x 500 ml</h5>
                            <p class="card-text">$990</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://beta.cruzverde.cl/on/demandware.static/-/Sites-masterCatalog_Chile/default/dwac72b909/images/large/277257-bion-3-senior-comprimido-recubierto-30-unidades-vitaminas.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Bion 3 Senior Vitaminas 30 Comprimidos Recubierto</h5>
                            <p class="card-text">$13.672</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://beta.cruzverde.cl/on/demandware.static/-/Sites-masterCatalog_Chile/default/dw56e1cff9/images/large/386770-elcal-flex-colageno-hidrolizado-polvo-suspension-oral-30-sobres.jpg">
                        <div class="card-body">
                            <h5 class="card-title">Elcal Flex Colageno Hidrolizado Polvo Suspension Oral 30 Sobres</h5>
                            <p class="card-text">$16190</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Detalles</a>
                                </div>
                                <a href="#" class="btn btn-success">Agregar</a>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="https://d1tjllbjmslitt.cloudfront.net/spree/products/22950/large_webp/1990194.webp?1641479955">
                            <div class="card-body">
                                <h5 class="card-title">TAPSIN</h5>
                                <p class="card-text">$600</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-primary">Detalles</a>
                                    </div>
                                    <a href="#" class="btn btn-success">Agregar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="https://www.laboratoriochile.cl/wp-content//uploads/2019/03/Ketoprofeno_50MG_20C_BE_HD.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Ketoprofeno</h5>
                                    <p class="card-text">$1880</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary">Detalles</a>
                                        </div>
                                        <a href="#" class="btn btn-success">Agregar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>