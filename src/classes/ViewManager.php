<?php declare(strict_types=1);

/**
 * Klasa ViewManager jest singletonem (wzorzec projektowy), co oznacza,
 *  że jednocześnie może być tylko jeden obiekt (instancja) tej klasy. Obiekt
 *  przechowywany jest bezpośrednio w klasie ($instance), żeby nie trzeba było
 *  go przekazywać albo tworzyć jako globalną zmienną. Klasę można uzyskać
 *  poprzez wywołanie ViewManager::getInstance().
 * @see https://pl.wikipedia.org/wiki/Singleton_(wzorzec_projektowy)
 *
 * Klasa ViewManager odpowiada za zarządzanie widokami i pozwala na renderowanie
 *  (tworzenie) zmiennych zawierających kod HTML w oparciu o plik php
 *  z przygotowanymi miejscami na wklejenie zmiennych. Tworzenie obywa się
 *  za pomocą metody render(string, array).
 *
 * Widoki muszą być plikami z rozszerzeniem dostępnym w tablicy przypisanej
 *  do stałej VIEW_EXTENSIONS.
 */
final class ViewManager {
    // Tutaj znajdują się dostępne rozszerzenia plików z widokami
    private const VIEW_EXTENSIONS = ['php', 'html'];
    // Tutaj "mieszka" instancja klasy
    private static $instance;
    // Tutaj będą lokalizacje folderów (po wywołaniu addTemplatesDirectory())
    private $templatesDir = [];

    public static function getInstance(): ViewManager
    {
        // Gdy nie ma jeszcze żadnej instancji, to utwórz nową
        if (self::$instance === null) {
            self::$instance = new ViewManager();
        }

        return self::$instance;
    }

    // Prywatny konstruktor nie pozwala utworzyć dodatkowej instancji klasy
    private function __construct() {}

    /**
     * Metoda służy dodaniu wszystkich ścieżek w których należy szukać plików
     *  widoków.
     * @param string $path ścieżka do folderu z widokami
     */
    public function addTemplatesDirectory(string $path): void
    {
        $this->templatesDir[] = $path;
    }

    /**
     * Metoda służy do przygotowania i wyświetlenia kodu HTML użytkownikowi.
     * @param string $view nazwa widoku do przygotowania
     * @param array $parameters tablica parametrów, gdy widok jej potrzebuje
     * @throws RuntimeException (z findViewFile())
     */
    public function render(string $view, array $parameters = []): void
    {
        ob_start();
        extract($parameters, EXTR_OVERWRITE);
        include $this->findViewFile($view);
        echo ob_get_clean();
        exit();
    }

    /**
     * Metoda służy do znalezienia pliku z widokiem (przeszukując wszystkie
     *  zadeklarowane foldery i dostępne rozszerzenia).
     * @param string $view nazwa pliku z widokiem
     * @return string ścieżka do pliku z widokiem
     * @throws RuntimeException gdy widok nie został odnaleziony
     */
    private function findViewFile(string $view): string
    {
        foreach (self::VIEW_EXTENSIONS as $ext) {
            foreach ($this->templatesDir as $dir) {
                if (file_exists("{$dir}/{$view}.{$ext}")) {
                    return "{$dir}/{$view}.{$ext}";
                }
            }
        }

        throw new RuntimeException("Widok \"{$view}\" nie został odnaleziony");
    }
}
