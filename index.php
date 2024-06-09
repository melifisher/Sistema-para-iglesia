<?php
require __DIR__ . '/vendor/autoload.php';

header('Location: /Presentacion/home.php');
 exit();
/*
$router = new AltoRouter();

// Define routes
$router->map('GET', '/', function() {
    header('Location: /Presentacion/home.php');
    exit();
}); 
$router->map('GET', '/Presentacion/layouts/home.php', function() {
    $templates = new League\Plates\Engine(__DIR__ . '/Presentacion');
    echo $templates->render('layouts/home');
});
$router->map('GET', '/Presentacion/PEstadoCivil/list', function() {
    $templates = new League\Plates\Engine(__DIR__ . '/Presentacion');
    echo $templates->render('PEstadoCivil/list');
});
$router->map('GET', '/Presentacion/PEstadoCivil/new.php', function() {
    $templates = new League\Plates\Engine(__DIR__ . '/Presentacion');
    echo $templates->render('PEstadoCivil/new');
});
$router->map('GET', '/Presentacion/PEstadoCivil/update.php', function() {
    $templates = new League\Plates\Engine(__DIR__ . '/Presentacion');
    echo $templates->render('PEstadoCivil/update');
});
$router->map('GET', '/Presentacion/PCargo/list.php', function() {
    $templates = new League\Plates\Engine(__DIR__ . '/Presentacion');
    echo $templates->render('PCargo/list');
});
*/
?>
