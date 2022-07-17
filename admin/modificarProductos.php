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
    <link rel="icon" type="image/png" href="../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous">
    </script>

</head>

<body>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Productos</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $sql = $conn ->prepare("SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria ORDER BY p.id DESC");
                    $sql->execute();
                    $resultado = $sql -> fetchALL(PDO::FETCH_ASSOC);
                    foreach($resultado as $row) { ?>
                        <?php
                        $id = $row['imagen'];
                        $imagen = "../assets/images/productos/$id";
                        if (!file_exists($imagen)){
                            $imagen = "../assets/images/not_found.jpg";
                        }
                        ?>
                        <tr>
                            <td><img class="img-thumbnail" src="<?php echo $imagen; ?>" width="50"></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['precio']; ?></td>
                            <td><?php echo $row['categoria']; ?></td>
                            <td>
                                <form method="post"
                                    action="modificarProductosAccion.php?accion=pro&id=<?php echo $row['id']; ?>&nombre=<?php echo $row['nombre'];?>&descripcion=<?php echo $row['descripcion'];?>&precio=<?php echo $row['precio'] ?>&imagen=<?php echo $row['imagen'] ?>&activo=<?php echo $row['activo'];?>"
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
    <div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="productos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-black">
                    <h5 class="modal-title" id="productos">Nuevo Producto</h5>

                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre"
                                        placeholder="Nombre" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea id="descripcion" class="form-control" name="descripcion"
                                        placeholder="Descripción" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio"
                                        placeholder="Precio" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <select id="categoria" class="form-control" name="categoria">
                                        <?php
                                    $categorias = $conn->prepare("SELECT * FROM categorias");
                                    $categorias->execute();
                                    foreach ($categorias as $cat) { ?>
                                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['categoria']; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="imagen">Foto</label>
                                    <input type="file" class="form-control" name="foto" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="btn btn-secondary" href="productos.php" role="button">Productos</a>
    <a class="btn btn-danger float-end" href="cerrarSesion.php" role="button">Salir</a>
</body>

</html>