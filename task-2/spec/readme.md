Teszt feladat
Készíts egy weboldalt, melynek tartalmához bejelentkezéssel tudsz hozzáférni!

Minimum szükséges fájlok:

- index.php
- login.php
- auth.php
- content.php
- user.txt

OOP-hoz minimum szükséges fájlok:

- User.php – User osztály
- Lottery.php – Lottery osztály
- Security.php – Security osztály

A bejelentkezési adatokat a user.txt-ben tárold úgy, hogy egy sorban egy felhasználó szerepelhet e-mail cím jelszó párossal.

Az e-mail cím és a jelszó tabulátorral legyen elválasztva, s a jelszó egy titkosítási módszerrel legyen tárolva, amelyet önmagában nem lehet visszafejteni.

Az auth.php keresztül vizsgáld, hogy a felhasználó bejelentkezett-e, illetve űrlap beküldéskor helyes adatokat kapunk.

Hiba esetén jelezd a felhasználónak, hogy a megadott e-mail cím, vagy jelszó hibás. („Hibás e-mail cím vagy jelszó!”)

Az index.php hívja meg az auth.php-t. Az auth.php-ban hívjuk, meg a login.php, ha a felhasználó még nincs bejelentkezve, mellyel megjelenítjük a bejelentkezési űrlapot, egyéb esetben a content.php-t hívja meg.

A content.php-ban helyezzünk el egy ötös lottó számgenerátort, mely minden 5. lapbetöltéskor újragenerálja a számokat. Ezen kívül tegyünk bele egy linket, melynek segítségével kijelentkeztetjük a felhasználót.

A feladatot objektumorientáltan készítsd el az MVC tervezési mintát szem előtt tartva. A szükséges fájlokon túl definiálhatsz saját fájlokat.

Megjegyzés: az oldal megjelenítéséhez nem kell semmilyen stílust, javascriptet használni.
