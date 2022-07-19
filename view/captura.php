<?php

require "../model/config.php";
require "../model/conectar.php";

$productos = $_SESSION['carrito']['productos'];
$listacarrito= array();

if($productos != NULL){
    foreach($productos as $clave => $cantidad){
        
        $carro = $conn -> prepare("SELECT id, nombre, precio, $cantidad as cantidad FROM productos WHERE id=? and activo=1");
        $carro -> execute([$clave]);
        $listacarrito[] = $carro -> fetch(PDO::FETCH_ASSOC);
    }}


$payment_id = $_GET['payment_id'];
$status = $_GET['status'];
$payment_type = $_GET['payment_type'];
$id_orden = $_GET['merchant_order_id'];
$fecha = date("Y-m-d H:i:s");

$total = 0;
foreach($listacarrito as $producto){
    $precio = $producto['precio'];
    $cantidad = $producto['cantidad'];
    $subtotal = $cantidad * $precio;
    $total += $subtotal;

}
$sql = $conn -> prepare("INSERT INTO compra (id_compra, estado, tipo_pago, fecha_pago, order_id, total,entregado) VALUES($payment_id,'$status','$payment_type','$fecha',$id_orden,$total, 0)");
$sql -> execute();
$id = $conn ->lastInsertId();


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
                    Carrito<span id="num_carr" class="badge bd-secondary"></span>
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
            </tr>
            </tbody>
            </table>
        </div>
    </div>


    <?php

echo "<h4 class='text-center text-white'>Pago Exitoso</h4>";

echo "<p class='text-center text-white'>ID de Usuario: ", $payment_id. '</p>';
echo "<p class='text-center text-white'>Estado: ",$status. '</p>';
echo "<p class='text-center text-white'>Tipo de Pago: ",$payment_type. '</p>';
echo "<p class='text-center text-white'>ID de Orden: ",$id_orden. '</p>';


$total = 0;
foreach($listacarrito as $producto){
    $_id = $producto['id'];
    $nombre = $producto['nombre'];
    $precio = $producto['precio'];
    $cantidad = $producto['cantidad'];
    $subtotal = $cantidad * $precio;
    $total += $subtotal;
echo "<p class='text-center text-white'>Productos: ",$nombre. '</p>';
echo "<p class='text-center text-white'>Cantidad: ",$cantidad. '</p>;


    </div>';
    $carro = $conn->prepare("INSERT INTO CARRO (id_orden,id_producto,nombre,cantidad,precio) values ($id_orden,$_id,'$nombre',$cantidad,$subtotal)");
    $carro ->execute(); }
echo "<p class='text-center text-white'>Total: ",$total. '</p>';
unset($_SESSION['carrito']);
?>
    <p class='text-center text-white fw-bold'>Direccion de entrega de Productos: Calle Falsa 123</p>
    <p class='text-center text-white fw-bold'>Lunes a Viernes de 09:30 a 18:00 Mostrando su ID de Orden</p>

    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Farmacias EcoProductos</p>
        </div>
    </footer>
</main>

</html>