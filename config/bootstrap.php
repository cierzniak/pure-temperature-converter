<?php declare(strict_types=1);

// Wyciągnij ścieżkę projektu (pełny adres na dysku)
$projectPath = dirname(__DIR__);
// Dopisz /src do ścieżki
$srcPath = "{$projectPath}/src";
// Znajdź wszystkie pliki z rozszerzeniem php w folderze /src
$srcFiles = glob("{$srcPath}/**/*.php");
// Pliki są ładowane w kolejności alfabetycznej, bez tych linii konwertery są
//  ładowane po fabryce strategii.
include "{$srcPath}/converter/strategies/TemperatureConverterInterface.php";
include "{$srcPath}/converter/strategies/KelvinConverter.php";
include "{$srcPath}/converter/strategies/CelsiusConverter.php";
include "{$srcPath}/converter/strategies/FahrenheitConverter.php";
// Zaimportuj je dynamicznie
//  (hack, ale przynajmniej nie każe pamiętać o tym smutnym obowiązku)
foreach ($srcFiles as $file) {
    include_once $file;
}

// Inicjowanie i dodanie folderu z widokami do ViewManagera
ViewManager::getInstance()->addTemplatesDirectory("{$projectPath}/view");
