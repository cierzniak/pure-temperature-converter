# Konwerter temperatur

Utwórz stronę przy użyciu HTML, CSS i PHP, która będzie służyć do konwersji
 temperatury między stopniami Celsjusza, Fahrenheita oraz kelwinami. Na stronie
 powinien znaleźć się formularz do wpisania wartości temperatury w wybranej
 jednostce oraz wyboru jednostki docelowej. Po naciśnięciu przycisku `Przelicz`
 pojawia się wartość po konwersji.

Po odebraniu danych z formularza, skrypt PHP powinien sprawdzać poprawność tych
 danych. Na przykład temperatura zera absolutnego to `-273,15` stopni
 Celsjusza. Z kolei skala Kelvina zaczyna się od `0 K`. Pokaż użytkownikowi
 błędy walidacji danych. Sprawdź, czy wpisano poprawną liczbę i wybrano
 prawidłową jednostkę.

Choć zadanie wydaje się trywialne, to z punktu widzenia kodu można wykonać je
 na wiele różnych sposobów. Kryteria oceniania:

1. Czytelność kodu i jego logiczna struktura. Elastyczność, łatwość rozbudowy i
 testowania. Zrozumiałe nazwy klas, metod, zmiennych - w języku angielskim.
2. Poprawne działanie w najnowszej wersji PHP. Odporność na błędy i niepoprawne
 dane.
3. Programowanie obiektowe: oddzielenie logiki od wyglądu strony. Spróbuj na
 przykład potraktować temperaturę jako tzw. _value object_, czyli osobną klasę
 przechowującą jedną konkretną wartość z mechanizmem walidacji.
4. Użycie dodatkowych narzędzi i bibliotek, np. Bootstrap/Material, SASS,
 Gulp/Webpack - jeśli uznasz je za przydatne w projekcie.
5. Zastosowanie standardów pisania kodu (PSR-1, PSR-2, PSR-12).

Powodzenia!
