<?php declare(strict_types=1);

// Wyciągnij ścieżkę projektu (pełny adres na dysku)
$projectPath = dirname(__DIR__);
// Dopisz /src do ścieżki
$srcPath = "{$projectPath}/src";
// Znajdź wszystkie pliki z rozszerzeniem php w folderze /src
$srcFiles = glob("{$srcPath}/**/*.php");
// Zaimportuj je dynamicznie
//  (hack, ale przynajmniej nie każe pamiętać o tym smutnym obowiązku)
foreach ($srcFiles as $file) {
    include_once $file;
}
// W zastępstwie za linijki 8-13 można pisać dla każdego utworzonego pliku:
//include "{$srcPath}/tutajNazwaFolderu/TutajNazwaKlasy.php";

// Inicjowanie i dodanie folderu z widokami do ViewManagera
ViewManager::getInstance()->addTemplatesDirectory("{$projectPath}/view");
