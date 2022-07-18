<?php

require 'config/config.php';
require 'config/conectar.php';

$json = file_get_contents('php://input');
$datos = json_decode($json,true);


if(is_array($datos)){

    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('y-m-d-h:i:s',strtotime($fecha));
    $email = $datos['detalles']['payer']['payer_id'];

    $sql = $conn -> prepare("INSERT INTO compra (id_transaccion, fecha, status, email, id_cliente,total) VALUES(?,
    ?,?,?,?,?)");
    $sql -> execute([$id_transaccion,$fecha_nueva,$status,$email,$id_cliente,$total]);
    $id = $conn ->lastInsertId();


    if(id >0){
        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : NULL;
        if($productos != NULL){
            foreach($productos as $clave => $cantidad){
                
                $sql = $conn -> prepare("SELECT id, nombre, precio as cantidad FROM productos WHERE id=? and activo=1");
                $sql -> execute([$clave]);
                $row_prod = $sql -> fetch(PDO::FETCH_ASSOC);
                $precio = $row_prod['precio'];
                $cantidad = $cantidad;

                $sql_insert = $conn->prepare("INSERT INTO detalle_compra (id_compra, nombre,
                precio,cantidad) VALUES (?,?,?,?,?");
                $sql_insert ->execute([$id,$clave,$row_prod['nombre'],$precio,$cantidad]);
            }
        }
        unset($_SESSION['carrito']);
     }
}



?>