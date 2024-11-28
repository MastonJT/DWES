<?php
$arrColores = ["red", "blue", "green", "yellow", "pink"];
if (!isset($_COOKIE['contador'])) {
    setcookie('contador', 0, time() + 3600);
} else {
    $contador = intval($_COOKIE['contador']) + 1;
    $color = $contador % 5;
    setcookie('contador', $contador, time() + 3600);
    cambiarFondo($arrColores[$color]);
}

function cambiarFondo($color)
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            body {
                background-color: <?php echo $color ?>;
                height: 100vh;
            }
        </style>
    </head>

    <body>

    </body>

    </html>
<?php
}
