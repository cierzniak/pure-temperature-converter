<?php declare(strict_types=1);

include __DIR__ . '/../config/bootstrap.php';

ViewManager::getInstance()->render('start', [
    'msg' => 'Hello world!',
    // Nie ma konwertera temperatur, dlatego ręcznie wprowadzono wartości
    'temp_c' => new Temperature(17.3, TemperatureUnit::celsius()),
    'temp_k' => new Temperature(290.15, TemperatureUnit::kelwin()),
]);
