<?php

define("KEY_TOKEN" , "APR.wqc-354*");

session_start();

$num_carr = 0;

if (isset($_SESSION['carrito']['productos'])){
    $num_carr = count($_SESSION['carrito']['productos']);
}

?>