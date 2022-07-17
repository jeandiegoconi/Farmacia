<?php
require "config/config.php";
require "config/conectar.php";
$sql = $conn -> prepare("SELECT id, nombre, precio, imagen FROM productos WHERE activo=1");
$sql -> execute();
$resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacias EcoProducts</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="index.php" class="navbar-brand">
                    <strong>Farmacias EcoProducts</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a href="checkout.php" class="btn btn-primary">
                        Carrito<span id="num_carr" class="badge bd-secondary"><?php echo $num_carr; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!--Contenido-->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row){ ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php
                        $id = $row['imagen'];
                        $imagen = "assets/images/productos/$id";
                        if (!file_exists($imagen)){
                            $imagen = "assets/images/not_found.jpg";
                        }
                        ?>
                        <img src="<?php echo $imagen;?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
                            <p class="card-text">$<?php echo number_format($row['precio']);; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="detalles.php?id=<?php echo $row["id"]; ?>&token=<?php echo
                                    hash_hmac('sha1' , $row['id'], KEY_TOKEN); ?>" class="btn btn-primary">Detalles</a>
                                </div>
                                <button class="btn btn-outline-success" type="button"
                                    onclick="carritoProducto(<?php echo $row['id']; ?>,'<?php echo hash_hmac('sha1' , $row['id'], KEY_TOKEN); ?>')">
                                    Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
        </div>
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Farmacias EcoProductos</p>
            </div>
        </footer>
    </main>

    <script src="js/carritoProducto.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>