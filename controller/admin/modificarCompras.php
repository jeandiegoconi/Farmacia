<?php



if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../../model/conectar.php";
        $id = $_GET['id'];
        if ($_POST) {
            $entregado = $_POST['entregado'];
            $sql = $conn ->prepare("UPDATE compra SET entregado = '$entregado' WHERE id_usuario = '$id';");
            $sql->execute();
            header('Location: compras.php');

        }
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
    <title>Modificar Compras</title>

</head>

<body>
    <div id="modificar" class="mb-3" tabindex="-1">
        <div class="dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-black">
                    <h5 class="modal-title" id="modificar">Modificar Compras</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="action">¿Producto entregado? </label>
                                    <input type="radio" name="entregado" id="entregado" value="1" <?php 
                                        if($_GET["entregado"] == 1){echo "checked";}?>>
                                    <label for="entregado">Entregado</label>

                                    <input type="radio" name="entregado" id="entregado" value="0"
                                        <?php if($_GET["entregado"] == 0){echo "checked";}?>>
                                    <label for="activo">No Entregado</label>
                                </div>
                            </div>
                                <button class="btn btn-primary" type="submit">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>