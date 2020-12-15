<?php declare(strict_types=1);

/**
 * Przeczytaj opis klasy Temperature - podobnie jak Temperature, to też jest
 *  ValueObject. Tutaj dodatkowo wprowadzona jest weryfikacja stanu obiektu
 *  poprzez metodę validate(). W przypadku chęci podania inej jednostki niż
 *  dozwolona system zwróci wyjątek.
 */
final class TemperatureUnit
{
    /**
     * Tablica dozwolonych jednostek
     * - kluczem jest nazwa wykorzystywana wewnątrz systemu
     * - wartością jest nazwa wykorzystywana do wyświetlania użytkownikowi
     */
    private const UNITS = [
        'K' => 'K',
        'C' => '&deg;C',
        'F' => '&deg;F',
    ];

    private $unit;

    /*
     * Ta konstrukcja jest nazywana "nazwanym konstruktorem"
     * @see https://verraes.net/2014/06/named-constructors-in-php/
     *
     * Wykorzystanie self jest zastępstewm za wywoływanie klasy bezpośrednio po
     *  nazwie TemperatureUnit (patrz celsius()). Pomaga to w przypadku zmiany
     *  nazwy klasy, ponieważ należy to zrobić w jednym miejscu.
     */
    public static function kelwin(): self
    {
        return new self('K');
    }

    public static function celsius(): TemperatureUnit
    {
        return new TemperatureUnit('C');
    }

    public static function fahrenheit(): self
    {
        return new self('F');
    }

    public function __construct(string $unit)
    {
        self::validate($unit);
        $this->unit = $unit;
    }

    // To zwróci klucz (K, C, ...)
    public function getUnit(): string
    {
        return $this->unit;
    }

    // To zwróci jednostkę do wyświetlenia użytkownikowi (K, oC, ...)
    public function getPrintableUnit(): string
    {
        return self::UNITS[$this->unit];
    }

    /**
     * Niniejsza metoda jest bardzo sprytnym sposobem na porównywanie obiektów.
     *  Porównywanie obiektów odbywa się na podstawie ich lokalizacji w pamięci,
     *  więc są tożsame dla ==, ale różne dla ===.
     * @see https://www.php.net/manual/en/language.oop5.object-comparison.php
     */
    public function equals(self $compare): bool
    {
        return $this->unit === $compare->unit;
    }

    private static function validate(string $unit): void
    {
        // Sprawdź czy podana jednostka znajduje się na liście kluczy w tabeli
        if (!array_key_exists($unit, self::UNITS)) {
            // Jeżeli nie istnieje, rzuć wyjątkiem
            throw new WrongTemperatureUnitException();
        }
    }
}
