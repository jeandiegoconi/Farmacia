<?php
require "../model/config.php";
require "../model/conectar.php";

$id = isset($_GET["id"]) ? $_GET["id"] : " " ;
$token = isset($_GET["token"]) ? $_GET["token"] : " ";

if($id == '' || $token == '' ){
    echo "Error";
    exit;
} else{

    $token_tmp = hash_hmac("sha1" , $id, KEY_TOKEN);

    if ($token == $token_tmp) {

        $sql = $conn-> prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1 ");
        $sql -> execute([$id]);
        if ($sql->fetchColumn() > 0) {

            $sql = $conn ->prepare("SELECT nombre, descripcion, precio, imagen FROM productos WHERE id=? AND activo=1 LIMIT 1 ");
            $sql->execute([$id]);
            $row = $sql ->fetch(PDO::FETCH_ASSOC);
            $nombre = $row["nombre"];
            $descripcion = $row["descripcion"];
            $precio = $row["precio"];
            $imagen = $row["imagen"];
        }
    } else {
        echo "Error";
        exit;
    }
}

$sql = $conn -> prepare("SELECT id, nombre, precio,imagen FROM productos WHERE activo=1");
$sql -> execute();
$resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
$get_dir = "../assets/images/productos/$imagen"

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacias EcoProducts</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/estilos.css" rel="stylesheet">
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
                            <a href="index.php" class="nav-link active">Catalogo</a>
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
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <img src="<?php echo $get_dir?>" class="d-block w-100">
                </div>
                <div class="col-md-6 order-md-2 text-white">
                    <h2><?php echo $nombre; ?></h2>
                    <h2> <?php echo "Precio: ". "$".$precio; ?></h2>
                    <p class="lead">
                        <?php echo $descripcion; ?>
                    </p>

                    <div class="d-grid gap-3 col-10 mx-auto">
                        <button class="btn btn-outline-primary" type="button"
                            onclick="carritoProducto(<?php echo $id; ?>,'<?php echo $token_tmp;?>')">
                            Agregar al carrito</button>
                    </div>
                </div>
            </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="../js/carritoProducto.js"></script>

</body>
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Farmacias EcoProductos</p>
    </div>
</footer>

</html>