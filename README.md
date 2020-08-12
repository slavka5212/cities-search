## About Project

Projekt Cities Search je webová aplikácia napísaná vo framework-u Laravel zameraná na vyhľadávanie obcí na Slovensku.
Na inštaláciu knižníc bol použitý npm. Štýlovanie je v SASS, kompilované do CSS.

## Instalation

Na inštalácia projektu je potrebné si stiahnuť git repozitár alebo použiť git clone a spustiť v terminály nasledujúci príkaz.
- **composer install** príkaz naištaluje composer

Vytvorenie .env súboru s nastaveniami aplikácie a databázy
- **cp .env.example .env**
- **php artisan key:generate**

Zmeniť prihlasovacie údaje do databázy v súbore .env

## Database

- **php artisan migrate**  Spustenie migrácií, vytvorenie tabuľky Cities.

Import dát do databázy je možný nasledujácimi spôsobmi: 

### A) Import dát z externej adresy

Importovanie prebieha parsováním dát z externej stránky https://www.e-obce.sk/. Realizujte sa pomocou knižnice sunra/php-simplehtml-dom-parser.
- **php artisan data:import** Importuje dáta o obciach do tabuľky Cities, parsuje pritom stránku https://www.e-obce.sk/
- **php artisan data:geocode** Zisťuje GPS zemepisné súradnice jednotlivých obcí (záznamov v tabuľke Cities). Používa sa API https://opencagedata.com/ trial verzia, ktorá poskytuje 2,500 API requests/day, čo je menej než všetkých záznamov v tabuľke Cities (2794 rows), preto sa uložia do databázy len zemepisné údaje pre prvých 2500 obcí.

**Upozornenie**: Každý z príkazov beží približne 15 minút (do konzoly sa postupne vypisujú názvy miest, ktoré sa práve importujú). 

### B) Import dát zo súboru XLSX
- **php artisan data:import** Importuje dáta zo súboru XLSX, ktorý bol vytvorený exportom databázovej tabuľky. Súbor sa nachádza na adrese: "\storage\app\cities.xlsx".

## Run

Na spustenie localhost a zabezpečenie, že sa bude automaticky sledovať zmena css (scss) súborov je potrebné spustiť nasledujúce príkazy:
- **npm run watch**  Sleduje zmeny
- **php artisan serve**  Spustí local server

## License

The project Cities Search is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
