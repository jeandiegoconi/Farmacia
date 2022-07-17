<?php



if (isset($_GET)) {
    !unlink("../assets/images/productos/".$_GET['imagen']);
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../config/conectar.php";
        $id = $_GET['id'];
        if ($_POST) {
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
            $activo = $_POST['activo'];

            
            $sql = $conn ->prepare("UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion',  precio = $precio, imagen = '$foto', id_categoria = $categoria, activo = $activo WHERE id = '$id';");
            $sql->execute();
            if ($sql) {
                if (move_uploaded_file($tmpname, $destino)) {
                    header('Location: productos.php');
                    
                }
                header('Location: modificarProductos.php');
            }
        }
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/png" href="../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>

</head>

<body>

    <div id="modificar" class="mb-3" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-black">
                    <h5 class="modal-title" id="productos">Modificar Producto</h5>

                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre"
                                        value="<?php echo $_GET['nombre'];?>" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea id="descripcion" class="form-control" name="descripcion" rows="3"
                                        required><?php echo $_GET['descripcion'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input id="precio" class="form-control" type="text" name="precio"
                                        value="<?php echo $_GET['precio'];?>" required>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="action">Producto Activo: </label>
                                    <input type="radio" name="activo" id="activo" value="1" <?php 
                                        if($_GET["activo"] == 1){echo "checked";}?>>
                                    <label for="activo">Activo</label>

                                    <input type="radio" name="activo" id="activo" value="0"
                                        <?php if($_GET["activo"] == 0){echo "checked";}?>>
                                    <label for="activo">No Activo</label>
                                </div>
                            </div>
                            <br></br>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>