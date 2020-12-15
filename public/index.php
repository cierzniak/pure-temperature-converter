<?php declare(strict_types=1);

include __DIR__ . '/../config/bootstrap.php';

$availableTemperatures = [
    'C' => 'stopnie Celsjusza',
    'F' => 'stopnie Fahrenheita',
    'K' => 'Kelwin',
];
$formData = [
    'baseUnit' => $_GET['b'] ?? null,
    'baseValue' => isset($_GET['v']) ? (float)$_GET['v'] : null,
    'targetUnit' => $_GET['t'] ?? null,
];
$formViolations = [];

if ($formData['baseUnit'] && $formData['baseValue'] !== null && $formData['targetUnit']) {
    try {
        $base = new Temperature($formData['baseValue'], new TemperatureUnit($formData['baseUnit']));
        $target = TemperatureConverterContext::convert($base, new TemperatureUnit($formData['targetUnit']));
    } catch (BelowAbsoluteZeroException $e) {
        $formViolations[] = 'Temperatura poniżej zera absolutnego';
    } catch (WrongTemperatureUnitException $e) {
        $formViolations[] = 'Błędna jednostka konwersji';
    }
}

ViewManager::getInstance()->render('start', [
    'available' => $availableTemperatures,
    'form' => $formData,
    'violations' => $formViolations,
    'conversionFrom' => $base ?? null,
    'conversionTo' => $target ?? null,
]);
