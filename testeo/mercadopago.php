<?php

// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-5891908448271198-071521-1b8a13b37168e9bc22057ee25334ec1e-165974405');

?>
<?php
$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = "Ibuprofeno";
$item->quantity = 1;
$item->unit_price = 1192;
$item->currency_id = "CLP";
$preference->items = array($item);

$preference->back_urls = array(
    "success" => "http://localhost/web/captura.php",
    "failure" => "http://localhost/web/failure.php"
);


$preference->save();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>

    <h3>Mercado Pago</h3>

    <div class="cho-container"></div>


    <script>
    // Agrega credenciales de SDK
    const mp = new MercadoPago("TEST-d09dc0d5-2e4e-42c7-8462-4b89b923d70c", {
        locale: "es-CL",
    });

    // Inicializa el checkout
    mp.checkout({
        preference: {
            id: "<?php echo $preference->id; ?>",
        },
        render: {
            container: ".cho-container", // Indica el nombre de la clase donde se mostrará el botón de pago
            label: "Pagar con MercadoPago", // Cambia el texto del botón de pago (opcional)
        },
    });
    </script>


</body>

</html>