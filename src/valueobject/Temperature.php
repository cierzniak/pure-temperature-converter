<?php declare(strict_types=1);

/**
 * To jest obiekt nazywany często ValueObject z racji tego, że jest wrapperem
 *  prostych typów (float z temperaturą i VO z jednostką temperatury).
 *  Przechowuje informacje o temperaturze i jednostce, które będą potrzebne
 *  do wykonania konwersji na inny typ.
 * @see https://martinfowler.com/bliki/ValueObject.html
 *
 * Znajdziesz tutaj dwie magiczne metody, z czego jedną już znasz. Tych
 *  "magicznych" jest oczywiście więcej i większość z nich wykorzystuje się
 *  w codziennym tworzeniu kodu.
 * @see https://www.php.net/manual/en/language.oop5.magic.php
 *
 * Klasa Temperature może być wykorzystywana do modelu konwersji między
 *  jednostkami.
 */
final class Temperature
{
    private $temperature;
    private $unit;

    public function __construct(float $temperature, TemperatureUnit $unit)
    {
        $this->temperature = $temperature;
        $this->unit = $unit;
    }

    public function __toString(): string
    {
        return "{$this->temperature} {$this->unit->getPrintableUnit()}";
    }

    public function getTemperature(): float
    {
        return $this->temperature;
    }

    public function getUnit(): TemperatureUnit
    {
        return $this->unit;
    }
}
