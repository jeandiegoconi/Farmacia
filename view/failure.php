<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="icon" type="image/png" href="../assets/icon.png" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacias EcoProducts</title>
    <link href="../css/estilos.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<!--Barra de navegación-->
<header>
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <strong>Farmacias EcoProducts</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader"
                aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarHeader">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Catalogo</a>
                    </li>
                </ul>
                <a href="checkout.php" class="btn btn-primary">
                    Carrito<span id="num_carr" class="badge bd-secondary"></span>
                </a>
            </div>
        </div>
    </div>
</header>

<!--Contenido-->
<main>
    <div class="container ">

        <div class="row">
            <div class="col-6 text-white">
                <h4>Detalles de pago</h4>
                <div class="cho-container"></div>
            </div>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>
</main>
<?php

echo "<h4 class=' bg-dark text-center text-white'>Error al realizar el pago.</h4>";

unset($_SESSION['carrito']);
?>
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Farmacias EcoProductos</p>
    </div>
</footer>

</html>