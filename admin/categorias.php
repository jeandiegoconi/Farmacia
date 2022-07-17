<?php
require_once "../config/conectar.php";
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $query = $conn->prepare("INSERT INTO categorias(categoria) VALUES ('$nombre')");
        $query->execute();
        if ($query) {
            header('Location: categorias.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Categorias</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categorias</h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $query = $conn->prepare("SELECT * FROM categorias ORDER BY id DESC");
                    $query->execute();
                    $resultado = $query -> fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['categoria']; ?></td>
                            <td>
                                <form method="post"
                                    action="eliminarCategorias.php?accion=cat&id=<?php echo $row['id']; ?>"
                                    class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="categorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-black">
                    <h5 class="modal-title" id="title">Nueva Categoria</h5>

                </div>
                <div class="modal-body">
                    <form action="" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Categoria"
                                required>
                        </div>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categorias">
        Nuevo</button>
    <a class="btn btn-secondary" href="productos.php" role="button">Productos</a>
    <a class="btn btn-secondary" href="modificarCategorias.php" role="button">Modificar Categorias</a>
    <a class="btn btn-danger float-end" href="cerrarSesion.php" role="button">Salir</a>
</body>

</html>