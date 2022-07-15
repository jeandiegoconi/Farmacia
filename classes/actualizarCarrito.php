<?php

require '../config/config.php';
require '../config/conectar.php';

if(isset($_POST['action'])){
    
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    if($action == 'agregar'){
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 0;
        $respuesta = agregar($id,$cantidad);
        if($respuesta > 0){
            $datos['ok'] = true;
        }else{
            $datos['ok'] = false;
        }
        $datos['sub'] = '$'.$respuesta;
    }else if($action == 'deleteItem'){
        $datos ['ok'] = deleteItem($id);
    } else{
        $datos['ok'] = false;
    }
}else{
    $datos['ok'] = false;
}

echo json_encode($datos);


function agregar($id,$cantidad){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $res = 0;
    if($id > 0 && $cantidad > 0 && is_numeric(($cantidad))){
        if(isset($_SESSION['carrito']['productos'][$id])){
            $_SESSION['carrito']['productos'][$id] = $cantidad;
            
                $conn = new PDO("mysql:host=$servername;dbname=tienda", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = $conn->prepare("SELECT precio FROM productos WHERE id=? AND activo=1 LIMIT 1");
                $sql->execute([$id]);
                $row = $sql ->fetch(PDO::FETCH_ASSOC);
                $precio = $row["precio"];
                $res = $cantidad * $precio;
                return $res;

        }
    }else{
        return $res;
    }
}

function deleteItem($id){
    if ($id > 0){
        if (isset($_SESSION['carrito']['productos'][$id])){
            unset($_SESSION['carrito']['productos'][$id]);
            return true;
        }
    }else{
        return false;
    }
}