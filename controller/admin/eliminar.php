<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../../model/conectar.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'pro') {
            $sql = $conn ->prepare("DELETE FROM productos WHERE id = $id");
            $sql->execute();
            if ($sql) {
                header('Location: productos.php');
            }
        }
    }
}
?>