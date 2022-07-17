<?php



if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../config/conectar.php";
        $id = $_GET['id'];
        if ($_POST) {
            $categoria = $_POST['categoria'];
            $sql = $conn ->prepare("UPDATE categorias SET categoria = '$categoria' WHERE id = '$id';");
            $sql->execute();
            if ($sql) {
                if (move_uploaded_file($tmpname, $destino)) {
                    header('Location: categorias.php');
                }
                header('Location: modificarCategorias.php');
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Categoria</title>
    
</head>
<body>


    <div id="modificar" class="mb-3" tabindex="-1">
        <div class="dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-black">
                    <h5 class="modal-title" id="modificar">Modificar Categoria</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="categoria" class="form-control" type="text" name="categoria"
                                    value="<?php echo $_GET['categoria'];?>" required>
                                </div>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>