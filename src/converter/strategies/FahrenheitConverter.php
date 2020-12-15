<?php declare(strict_types=1);

final class FahrenheitConverter implements TemperatureConverterInterface
{
    private const KELVIN_TO_FAHRENHEIT_OFFSET = 459.67;
    private const KELVIN_TO_FAHRENHEIT_RATIO = 5 / 9;
    private const FAHRENHEIT_TO_KELVIN_RATIO = 9 / 5;

    public static function unit(TemperatureUnit $unit): bool
    {
        return TemperatureUnit::fahrenheit()->equals($unit);
    }

    public static function toKelvin(Temperature $temperature): Temperature
    {
        if (!self::unit($temperature->getUnit())) {
            throw new WrongTemperatureUnitException();
        }

        return new Temperature(
            ($temperature->getTemperature() + self::KELVIN_TO_FAHRENHEIT_OFFSET) * self::KELVIN_TO_FAHRENHEIT_RATIO,
            TemperatureUnit::kelwin()
        );
    }

    public static function fromKelvin(Temperature $temperature): Temperature
    {
        if (!TemperatureUnit::kelwin()->equals($temperature->getUnit())) {
            throw new WrongTemperatureUnitException();
        }

        return new Temperature(
            ($temperature->getTemperature() * self::FAHRENHEIT_TO_KELVIN_RATIO) - self::KELVIN_TO_FAHRENHEIT_OFFSET,
            TemperatureUnit::fahrenheit()
        );
    }
}
