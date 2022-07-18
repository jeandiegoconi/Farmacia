<?php



if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../../model/conectar.php";
        $id = $_GET['id'];
        }
  }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Compras</title>

</head>

<body>

    <body class="bg-dark">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-white bg-dark">Detalle de Compras</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-dark table-hover table-bordered" style="width: 100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $sql = $conn ->prepare("SELECT * from carro WHERE id_orden = '$id'");
                    $sql->execute();
                    $resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row) { ?>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['cantidad']; ?></td>
                            <td><?php echo '$',$row['precio']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a class="btn btn-secondary" href="productos.php" role="button">Productos</a>
    <a class="btn btn-secondary" href="categorias.php" role="button">Categorias</a>
    <a class="btn btn-danger float-end" href="cerrarSesion.php" role="button">Salir</a>
    <a class="btn btn-secondary" href="compras.php" role="button">Compras</a>


    </body>

</html>