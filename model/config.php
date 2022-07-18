<?php

define("KEY_TOKEN" , "APR.wqc-354*");
define("TOKEN_MP","TEST-5891908448271198-071521-1b8a13b37168e9bc22057ee25334ec1e-165974405");

session_start();

$num_carr = 0;

if (isset($_SESSION['carrito']['productos'])){
    $num_carr = count($_SESSION['carrito']['productos']);
}

?>