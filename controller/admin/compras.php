<?php
require_once "../../model/conectar.php";

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>
</head>

<body class="bg-dark">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-white bg-dark">Compras</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-dark table-hover table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Usuario</th>
                            <th>ID Compra</th>
                            <th>Estado de compra</th>
                            <th>Tipo Pago</th>
                            <th>Fecha Pago</th>
                            <th>ID de Orden</th>
                            <th>Total a pagar</th>
                            <th>Entregado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sql = $conn ->prepare("SELECT * from compra");
                    $sql->execute();
                    $resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row) { ?>
                        <td><?php echo $row['id_usuario']; ?></td>
                        <td><?php echo $row['id_compra']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['tipo_pago']; ?></td>
                        <td><?php echo $row['fecha_pago']; ?></td>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo'$', $row['total']; ?></td>
                        <?php if($row["entregado"] == 1){
                            $resEntrega= '<td class = "table-success">Entregado';}
                            if($row["entregado"] ==0){
                            $resEntrega = '<td class = "table-danger">No Entregado';}?>
                        <?php echo $resEntrega; ?></td>
                        <td>
                            <form method="post"
                                action="modificarCompras.php?accion=pro&id=<?php echo $row['id_usuario'];?>&entregado=<?php echo $row['entregado'];?>"
                                class="d-inline modificar">
                                <button class="btn btn-secondary" type="submit">Modificar</button>
                            </form>
                        </td>
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

</body>

</html>