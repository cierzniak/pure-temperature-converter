<?php declare(strict_types=1);

include __DIR__ . '/../config/bootstrap.php';

$celsius = new Temperature(17.3, TemperatureUnit::celsius());
$kelvin = TemperatureConverterContext::convert($celsius, TemperatureUnit::kelwin());

ViewManager::getInstance()->render('start', [
    'msg' => 'Hello world!',
    // Nie ma konwertera temperatur, dlatego ręcznie wprowadzono wartości
    'temp_c' => $celsius,
    'temp_k' => $kelvin,
]);
