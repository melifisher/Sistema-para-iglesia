<?php require_once ('../../Negocio/NMatrimonio.php'); require_once ('../../Negocio/NPersona.php'); $nMatrimonio=new
    NMatrimonio(); $nPersona=new NPersona(); $matrimonio=$nMatrimonio->obtenerPorNro($_GET['nro']);
    $esposo = $nPersona->obtenerPorId($matrimonio->id_esposo);
    $esposa = $nPersona->obtenerPorId($matrimonio->id_esposa);
    setlocale(LC_TIME, 'es_ES.UTF-8');
    ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Certificado de Matrimonio</title>
        <style>
            body {
                margin: 5px;
                border-radius: 25px;
                border: 2px solid black;
            }

            .container {
                margin: 10px auto;
                padding: 15px;
                max-width: 800px;
                margin-left: 30px;
            }

            .texto-con-linea {
                border-bottom: 1px dotted black;
                /* Estilo de la línea punteada */
                margin-top: -2px;
            }
        </style>
    </head>

    <body>
        <div class="container">

            <div style="width: 25%;">
            <h2 style="font-size: 22px;">Arquidiócesis de Santa Cruz de la Sierra, Bolivia</h2>

            </div>

            <br>
            <div style="text-align: center;">
                <h1>CERTIFICADO DE MATRIMONIO</h1>
            </div>

            <div style="margin-top: 10px;">
                <p>Parroquia: PARROQUIA MARIA AUXILIADORA</p>
                <p>N°: <b><?php echo $matrimonio->nro ?> </b></p>
            </div>

            <div style="text-align: center; ">
                <div class="texto-con-linea">
                    <p style="font-size: larger; font-weight: bold;">
                        <?php echo $esposa->nombre . " " . $esposa->apellidos ?>
                    </p>
                </div>

                <p>Nombres y apellidos de la Esposa</p>
                <p style="text-align:left;">Fecha de nacimiento:
                    <?php echo strftime("%d de %B de %Y", strtotime($esposa->fecha_nacimiento)) ?></p>
            </div>

            <div style="margin-top: 5px; text-align: center; ">

                <div class="texto-con-linea">
                    <p style="font-size: larger; font-weight: bold;">
                        <?php echo $esposo->nombre . " " . $esposo->apellidos ?>
                    </p>
                </div>

                <p>Nombres y apellidos del Esposo</p>
                <p style="text-align:left;">Fecha de nacimiento:
                    <?php echo strftime("%d de %B de %Y", strtotime($esposo->fecha_nacimiento)) ?></p>
            </div>

            <div style="margin-top: 10px; ">
                <p>Lugar y fecha del matrimonio: <?php $fecha = strftime("%d de %B de %Y", strtotime($matrimonio->fecha_celebracion));
                echo $matrimonio->lugar . ", " . $fecha ?></p>
                <p>Celebrante del sacramento: P. <?php $parroco = $nPersona->obtenerPorId($matrimonio->id_parroco);
                echo $parroco->nombre . " " . $parroco->apellidos ?></p>
                <p>Testigos: <?php echo $matrimonio->testigos ?></p>
            </div>

            <div style="margin-top: 10px; ">
                <p>Fecha: <?php echo strftime("%d de %B de %Y", strtotime($matrimonio->fecha_registro)) ?></p>
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <p>.....................................................</p>
                <p>Firma del Parroco</p>
            </div>


        </div>

    </body>

    </html>