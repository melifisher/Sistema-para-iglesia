<?php
require_once ('../../Negocio/NConfirmacion.php');
require_once ('../../Negocio/NPersona.php');

$nConfirmacion = new NConfirmacion();
$nPersona = new NPersona();
$confirmacion = $nConfirmacion->obtenerPorNro($_GET['nro']);
$confirmado = $nPersona->obtenerPorId($confirmacion->id_confirmado);
setlocale(LC_TIME, 'es_ES.UTF-8');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de Confirmación</title>
    <style>
        body {
            margin: 5px;
            border-radius: 25px;
            border: 2px solid black;
        }

        .container {
            margin: 20px auto;
            padding: 20px;
            max-width: 800px;
            margin-left:30px;
        }
    </style>
</head>

<body>
    <div class="container">

        <div style="width: 25%;">
            <h2>Arquidiócesis de Santa Cruz de la Sierra, Bolivia</h2>
        </div>

        <br>
        <div style="text-align: center;">
            <h1>CERTIFICADO DE CONFIRMACIÓN</h1>
        </div>

        <div style="margin-top: 10px;">
            <p>Parroquia: PARROQUIA MARIA AUXILIADORA</p>
            <p>N°: <b><?php echo $confirmacion->nro ?> </b></p>
        </div>

        <div style="margin-top: 5px; text-align: center; ">
            <p style="font-size: larger; font-weight: bold;">
                <?php echo $confirmado->nombre . " " . $confirmado->apellidos ?></p>
            <p>............................................................................................................................................................
            </p>

            <p>Nombres y apellidos del confirmado</p>
            <p style="text-align:left;">Fecha de nacimiento: <?php echo strftime("%d de %B de %Y", strtotime($confirmado->fecha_nacimiento)) ?></p>
        </div>

        <div style="margin-top: 10px; ">
            <p>Lugar y fecha del bautizo: <?php $fecha = strftime("%d de %B de %Y", strtotime($confirmacion->fecha_celebracion));
            echo $confirmacion->lugar . ", " . $fecha ?></p>
            <p>Celebrante del sacramento: P. <?php $parroco = $nPersona->obtenerPorId($confirmacion->id_parroco);
            echo $parroco->nombre . " " . $parroco->apellidos ?></p>
            <p>Padrinos: <?php echo $confirmacion->padrinos ?></p>
        </div>

        <div style="margin-top: 10px; ">
            <p>Fecha: <?php echo strftime("%d de %B de %Y", strtotime($confirmacion->fecha_registro)) ?></p>
        </div>
        <div style="text-align: center; margin-top: 50px;">
            <p>.....................................................</p>
            <p>Firma del Parroco</p>
        </div>


    </div>

</body>

</html>