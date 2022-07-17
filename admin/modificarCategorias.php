<?php
require_once "../config/conectar.php";

if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['foto'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $foto = $fecha . ".jpg";
        $destino = "../assets/images/productos/" . $foto;
        $activo = 1;
        $sql = $conn ->prepare("INSERT INTO productos(nombre, descripcion, precio, imagen, id_categoria,  activo) VALUES ('$nombre', '$descripcion', '$precio','$foto' ,'$categoria',$activo)");
        $sql->execute();
        if ($sql) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: productos.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Categorias</title>
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
                                    action="modificarCategoriasAccion.php?accion=cat&id=<?php echo $row['id']; ?>&categoria=<?php echo$row['categoria']?>"
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
    </div>
    <a class="btn btn-secondary" href="categorias.php" role="button">Categorias</a>
</body>

</html>