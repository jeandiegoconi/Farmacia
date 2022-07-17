<?php
require "config/config.php";
require "config/conectar.php";

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : NULL;




$listacarrito= array();

if($productos != NULL){
    foreach($productos as $clave => $cantidad){
        
        $sql = $conn -> prepare("SELECT id, nombre, precio, $cantidad as cantidad FROM productos WHERE id=? and activo=1");
        $sql -> execute([$clave]);
        $listacarrito[] = $sql -> fetch(PDO::FETCH_ASSOC);
    }
}

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
                <a href="./index.php" class="navbar-brand">
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
            <div class="table-response">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
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
                    ?>
                        <tr>
                            <td><?php echo $nombre ?></td>
                            <td><?php echo '$', $precio ?></td>
                            <td>
                                <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad ?>" size="5"
                                    id="cantidad_<?php echo $_id; ?>"
                                    onchange="cantidadCarrito(this.value,<?php echo $_id;?>)">
                            </td>
                            <td>
                                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">$<?php echo $subtotal ?>
                                </div>
                            </td>
                            <td><a id="delete" class="btn btn-warning btn-sm" data-bs-id="<?php echo
                            $_id; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Eliminar</a></td>
                        </tr>
                        <?php } ?>

                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">
                                <p class="h3" id="total"><?php echo '$', $total ?></p>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <?php if ($listacarrito != NULL){?>
            <div class="row">
                <div class="col-md-5 offfset-md-7 d-grid gap-2">
                    <a href="pago.php" class="btn btn-primary btn-lg">Realizar pago</a>
                </div>
            </div>
            <?php }?>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Alerta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el producto del carrito?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button id="btn-delete" type="button" class="btn btn-danger"
                        onclick="deleteItem()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/cantidadCarrito.js"></script>


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