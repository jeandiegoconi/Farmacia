<?php
require "../model/config.php";
require "../model/conectar.php";
require '../vendor/autoload.php';

MercadoPago\SDK::setAccessToken(TOKEN_MP);

$preference = new MercadoPago\Preference();

$productos_mp = array();



$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : NULL;
 



$listacarrito= array();

if($productos != NULL){
    foreach($productos as $clave => $cantidad){
        
        $sql = $conn -> prepare("SELECT id, nombre, precio, $cantidad as cantidad FROM productos WHERE id=? and activo=1");
        $sql -> execute([$clave]);
        $listacarrito[] = $sql -> fetch(PDO::FETCH_ASSOC);
    }
} else{
    header("Location: index.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacias EcoProducts</title>
    <link href="../css/estilos.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <script src="https://sdk.mercadopago.com/js/v2"></script>

</head>

<body>
    <!--Barra de navegación-->
    <header>
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a href="../index.php" class="navbar-brand">
                    <strong>Farmacias EcoProducts</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                    aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link active">Catalogo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contacto</a>
                        </li>
                    </ul>
                    <a href="classes/carrito.php" class="btn btn-primary">
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
                <div class="col-6 text-white">
                    <h4>Detalles de pago</h4>
                    <div class="cho-container"></div>
                </div>


                <div class="col-6">
                    <div class="table-response">
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>SubTotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($listacarrito == NULL){

                        echo '<tr><td colspan="5" class="text-center"><b>Vacio</b></td></tr>';

                    }else{
                        $total = 0;
                        foreach($listacarrito as $producto){
                            $_id = $producto['id'];
                            $nombre = $producto['nombre'];
                            $precio = $producto['precio'];
                            $cantidad = $producto['cantidad'];
                            $subtotal = $cantidad * $precio;
                            $total += $subtotal;

                            $item = new MercadoPago\Item();
                            $item->id =$_id;
                            $item->title =  $nombre;
                            $item->quantity = $cantidad;
                            $item->unit_price = $precio;
                            $item->currency_id = "CLP";

                            array_push($productos_mp, $item);
                            unset($item);
                    ?>
                                <tr>
                                    <td><?php echo $nombre ?></td>

                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                            $<?php echo $subtotal ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>

                                <tr>
                                    <td colspan="2">
                                        <p class="h3 text-end" id="total"><?php echo '$', $total ?></p>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <?php

        $preference->items = $productos_mp;
        $preference->back_urls = array(
            "success" => "http://localhost/web/view/captura.php",
            "failure" => "http://localhost/web/view/failure.php"
        );
        $preference->save();        
        ?>

    <script>
    // Agrega credenciales de SDK
    const mp = new MercadoPago("TEST-d09dc0d5-2e4e-42c7-8462-4b89b923d70c", {
        locale: "es-CL",
    });

    // Inicializa el checkout
    mp.checkout({
        preference: {
            id: "<?php echo $preference->id; ?>",
        },
        render: {
            container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
            label: "Pagar con MercadoPago", // Cambia el texto del botón de pago (opcional)
        },
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Farmacias EcoProductos</p>
    </div>
</footer>

</html>