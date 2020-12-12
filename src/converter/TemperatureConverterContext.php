<?php declare(strict_types=1);

/**
 * To jest kontekst strategii, który ma prostą zasadę - wybrać odpowiednią
 *  strategię i dokonać konwersji między jednostkami temperatury.
 */
final class TemperatureConverterContext
{
    // Tutaj przechowywane są kolejne dostępne strategie
    private const AVAILABLE_STRATEGIES = [
        /**
         * NazwaKlasy::class wyciągnie FQCN (Fully Qualified Class Name). Jest
         *  to string z pełną nazwą (wraz z przestrzenią nazw). Dla tego
         *  projektu przestrzeń nazw jest jedna, wspólna.
         * @see https://www.php.net/manual/en/language.namespaces.rules.php
         *
         * W związku z tym, że w tym projekcie nie ma autoloadera, musimy podać
         *  tę tablicę ręcznie, w innym przypadku moglibyśmy wskazać gdzie
         *  aplikacja znajdzie wszystkie klasy konwerterów, albo jaki interfejs
         *  muszą spełniać i automatycznie je odnajdować z katalogu klas.
         * @see https://www.php.net/manual/en/language.oop5.autoload.php
         */
        KelvinConverter::class,
        CelsiusConverter::class,
    ];

    /**
     * Jedyna publiczna metoda w konwerterze, to ona będzie zamieniała jednostkę
     *  temperatury z pośrednictwem Kelwinów (więcej o tym dlaczego
     *  w interfejsie strategii).
     */
    public static function convert(Temperature $base, TemperatureUnit $target): Temperature
    {
        $kelvin = self::toBase($base);

        return self::toTarget($kelvin, $target);
    }

    private static function getStrategy(TemperatureUnit $unit): string
    {
        foreach (self::AVAILABLE_STRATEGIES as $strategy) {
            // Można wywołac dynamicznie klasę wykorzystując jej stringa z FQCN
            if ($strategy::unit($unit)) {
                // Ale tutaj dalej to jest string z nazwą klasy
                return $strategy;
            }
        }

        throw new RuntimeException('No strategy found');
    }

    private static function toBase(Temperature $temperature): Temperature
    {
        $strategy = self::getStrategy($temperature->getUnit());

        return $strategy::toKelvin($temperature);
    }

    private static function toTarget(Temperature $kelvin, TemperatureUnit $target): Temperature
    {
        $strategy = self::getStrategy($target);

        return $strategy::fromKelvin($kelvin);
    }
}
