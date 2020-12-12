<?php declare(strict_types=1);

/**
 * To jest interfejs. Nie zawiera własności, nie zawiera stałych, a także...
 *  metod. W interfejsie można zdefiniować wyłącznie sygnatury metod i to
 *  jeszcze publicznych.
 * Wykorzystując interfejs można stworzyć wiele projekcji klasy, która będzie
 *  spełniała dokładnie te same metody. Dzięki temu można napisać uniwersalną
 *  adaptację i zmieniać tylko jakiś fragment implementacji.
 * @see https://pl.wikipedia.org/wiki/Strategia_(wzorzec_projektowy)
 *
 * W tym przypadku interfejs odnosi się do poszczególnych strategii konwersji
 *  temperatury. Założenie jest takie, że możemy dodawać kolejne klasy
 *  konwertera, które zamieniają nam temperaturę do jednostki bazowej (w tym
 *  wypadku Kelwinów). W fabryce odbywa się wybór odpowiedniej strategii, ale
 *  o tym więcej przeczytasz w klasie TemperatureConverterFactory.
 */
interface TemperatureConverterInterface
{
    /**
     * W tej metodzie zwracana jest informacja czy program trafił
     *  na zadeklarowaną jednostę temperatury. Będzie to potrzebne
     *  do poszukiwania odpowiedniej strategii z listy dostępnych.
     */
    public static function unit(TemperatureUnit $unit): bool;

    /**
     * Ta metoda odpowiada za konwersję z jednostki zastanej do Kelwinów.
     */
    public static function toKelvin(Temperature $temperature): Temperature;

    /**
     * Analogicznie ta metoda odpowiada za konwersję z Kelwinów na jednostkę
     *  docelową.
     */
    public static function fromKelvin(Temperature $temperature): Temperature;
}
