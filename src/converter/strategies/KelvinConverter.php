<?php declare(strict_types=1);

final class KelvinConverter implements TemperatureConverterInterface
{
    public static function unit(TemperatureUnit $unit): bool
    {
        return TemperatureUnit::kelwin()->equals($unit);
    }

    public static function toKelvin(Temperature $temperature): Temperature
    {
        if (!self::unit(TemperatureUnit::kelwin())) {
            throw new WrongTemperatureUnitException();
        }

        return $temperature;
    }

    public static function fromKelvin(Temperature $temperature): Temperature
    {
        if (!self::unit(TemperatureUnit::kelwin())) {
            throw new WrongTemperatureUnitException();
        }

        return $temperature;
    }
}
