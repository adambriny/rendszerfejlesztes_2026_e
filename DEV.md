# Helyi beállítás (Local Setup)
## 1. Projekt elhelyezése
Klónozd vagy csomagold ki a projektet a webszervered gyökérkönyvtárába (pl. XAMPP esetén a `htdocs/rendszerfejlesztes_2026_e-main` mappába), vagy tartsd a saját munkakönyvtáradban, ha a PHP beépített szerverét használod.

## 2. Adatbázis beállítása
Győződj meg róla, hogy a helyi MySQL/MariaDB szerver fut, majd hozd létre az adatbázist, és importáld a sémát, valamint a kezdőadatokat a `data/database.sql` fájlból:

### Parancssorból:
### Bash
- mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS webshop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
- mysql -u root -p webshop < data/database.sql

*(Alternatív megoldásként nyisd meg a phpMyAdmin felületét, hozz létre egy új adatbázist, és importáld közvetlenül a* `data/database.sql` *fájlt.)*

## 3. Adatbázis-konfiguráció
Ellenőrizd és módosítsd az adatbázis-kapcsolati adatokat a `webshop/config/db.php` fájlban, hogy azok megfeleljenek a helyi környezetednek (hoszt, adatbázis neve, felhasználónév és jelszó).

## Helyi futtatás (Run Locally)
### A) opció: A PHP beépített fejlesztői szerverének használata
Navigálj a `public` mappába, és indítsd el a szervert:

### Bash
- cd webshop/public
- php -S localhost:8000
### Az alkalmazás az alábbi címeken lesz elérhető:

- Webshop főoldal: `http://localhost:8000/index.php`

- Bejelentkezés: `http://localhost:8000/login.php`

- Regisztráció: `http://localhost:8000/register.php`

### B) opció: Apache használata (XAMPP / WAMP / Laragon)
Indítsd el az Apache és a MySQL szolgáltatásokat a vezérlőpultban, majd nyisd meg a böngészőben az alábbi címet:

- `http://localhost/rendszerfejlesztes_2026_e-main/webshop/public/index.php`

## Ellenőrzés és manuális tesztelés
Mivel a projekt jelenleg manuális funkcionális tesztelésre épül, ellenőrizd a működést az alapvető felhasználói folyamatok kipróbálásával a böngészőben:

1. Nyisd meg a `register.php` oldalt, és hozz létre egy új felhasználói fiókot.

2. Jelentkezz be a `login.php` felületen, és ellenőrizd a munkamenet (session) megmaradását az `index.php` oldalon.

3. Ellenőrizd az adatbázis tábláit, hogy meggyőződj a rekordok megfelelő mentéséről és lekérdezéséről.