# Projekt "Travel Mate"

## Tematyka projektu: Travel Mate – aplikacja do planowania podróży

## Autor: Lilia Hurko

## Opis projektu:
"Travel Mate" to aplikacja webowa umożliwiająca użytkownikom planowanie podróży.
 Użytkownicy mogą przeglądać popularne tury, zamawiać je,
 a także oglądać szczegółowe informacje oraz zdjęcia związane z poszczególnymi ofertami.
 Dodatkowo, użytkownicy mogą przeglądać rekomendacje innych podróżników.

## Funkcjonalności:
- Rejestracja i logowanie użytkowników: Umożliwia użytkownikom założenie konta, logowanie oraz edytowanie konta.
- Tworzenie planów podróży: Użytkownicy mogą tworzyć listy miejsc, które chcą odwiedzić, oraz dodawać szczegóły podróży (daty, noclegi, transport).
- Filtrowanie i wyszukiwanie: Możliwość wyszukiwania miejsc po lokalizacji, typie atrakcji oraz ocenach.
- Przeglądanie opinii i recenzji: Użytkownicy mogą przeglądać opinie i recenzje innych podróżników dotyczące miejsc oraz atrakcji.
- Formularz kontaktowy: Umożliwia użytkownikom wysyłanie zapytań i wiadomości do administracji aplikacji za pomocą formularza kontaktowego.

## Wykorzystane technologie:
- Back-end: PHP (OOP, MVC), PDO (do obsługi bazy danych MySQL)
- Front-end: HTML5, CSS3 (W3C), JavaScript
- Baza danych: MySQL
- Autentykacja użytkowników: PHP sessions, haszowanie haseł
- Walidacja formularzy: `filter_input()` i `filter_input_array()` do walidacji danych

## Wymagania:
- XAMPP (MySQL Database, Apache Web Server)
- **PHP** 8.3.x
- MySQL

## Instrukcja uruchomienia:
1. Skopiuj projekt do katalogu `XAMPP\htdocs`.
2. Skonfiguruj bazę danych (Wejdź do phpMyAdmin (localhost/phpmyadmin).
                            Utwórz nową bazę danych, np. travel_mate.
                            Importuj bazę z pliku travelmate.sql).
3. W projekcie edytuj plik konfiguracyjny bazy danych (config/db.php), zmieniając port na 3307
4. Uruchom aplikację w przeglądarce pod adresem:
   http://localhost/nazwa_folderu

## Testowe konto:
- **Użytkownik **:
    - Login: liliagurko51@gmail.com
    - Hasło: A1b2c3d4/



