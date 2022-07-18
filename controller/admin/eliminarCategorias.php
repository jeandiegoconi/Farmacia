<?php
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../../model/conectar.php";
        $id = $_GET['id'];
        if ($_GET['accion'] == 'cat') {
            $sql = $conn ->prepare("DELETE FROM categorias WHERE id = $id");
            $sql->execute();
            if ($sql) {
                header('Location: categorias.php');
            }
        }
    }
}
?>