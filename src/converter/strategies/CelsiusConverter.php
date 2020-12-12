<?php declare(strict_types=1);

final class CelsiusConverter implements TemperatureConverterInterface
{
    private const KELVIN_TO_CELSIUS_OFFSET = 273.15;

    public static function unit(TemperatureUnit $unit): bool
    {
        return TemperatureUnit::celsius()->equals($unit);
    }

    public static function toKelvin(Temperature $temperature): Temperature
    {
        if (!self::unit($temperature->getUnit())) {
            throw new RuntimeException('Tried to convert from wrong unit');
        }

        return new Temperature(
            $temperature->getTemperature() + self::KELVIN_TO_CELSIUS_OFFSET,
            TemperatureUnit::kelwin()
        );
    }

    public static function fromKelvin(Temperature $temperature): Temperature
    {
        if (!TemperatureUnit::kelwin()->equals($temperature->getUnit())) {
            throw new RuntimeException('Tried to convert from wrong unit');
        }

        return new Temperature(
            $temperature->getTemperature() - self::KELVIN_TO_CELSIUS_OFFSET,
            TemperatureUnit::celsius()
        );
    }
}
