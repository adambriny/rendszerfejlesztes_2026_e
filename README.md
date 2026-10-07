# Rendszerfejlesztés 2026 E

E csoport
## 1. Összefoglaló 

`A projekt célja egy olyan C2C (Customer-to-Customer) típusú online piackert és hirdetési platform fejlesztése, ahol a regisztrált felhasználók egyetlen fiókkal képesek mind vevői, mind eladói szerepkört betölteni. A platformon a felhasználók saját termékeiket és szolgáltatásaikat tehetik közzé (képekkel, leírással, árazással), míg más felhasználók böngészhetnek, szűrhetnek a kategóriák között, és megrendelést adhatnak le. A rendszer célja a lakossági adásvétel egyszerűsítése egy átlátható, reszponzív és biztonságos webes felületen keresztül.`



## 2. A projekt bemutatása

`Ez a projektterv a Szallítmányozás projektet mutatja be, amely 2026-09-07-től 2026-12-02-ig tart, azaz összesen 86 napon keresztül fog futni. A projekten három fejlesztő fog dolgozni, az elvégzett feladatokat pedig négy alkalommal fogjuk prezentálni a megrendelőnek, annak érdekében, hogy biztosítsuk a projekt folyamatos előrehaladását.`



### 2.1. Rendszerspecifikáció

`A projektunk célja egy olyan webshop létrehozása amely alkalmas arra hogy egy online felületett biztosítson eladásra és termékek megvételére. A weboldalunkon regisztráció majd azt követő bejelentkezés lesz szükséges a felhasználók száméra. Az online felületünk több felhasználó barát funkcióval is el lesz látva többek között a személyek saját profiljainak megtekintésére és módósitására valamint az adás-vételi előzmények megtekintésére. A felhasználói felület számára biztositva lesz az is hogy saját termékeket illetve hirdetéseket töltsenek fel. A weboldalunk biztositja a felhasználók számára a gyors keresgélést az oldalon ezt pedig egy kereső funkcióval oldjuk meg. A projektunk továbbá kiterjed a felhasználók kosarainak kezelésére. Illetve egy adminisztrátori felületet is létrehozunk annak érdekében hogy felügylejük az oldal biztonságát, a felhasználók hiteleségét illetve a hibátlan működést.`


### 2.2. Funkcionális követelmények

* **Felhasználói fiók és jogosultságok:**
  * `Regisztráció és bejelentkezés biztonságos jelszókezeléssel.`
  * `Egyetlen regisztrált fiók dinamikusan képes eladóként és vevőként is működni.`
  * `Profiloldal: saját adatok módosítása, saját hirdetések és korábbi vásárlások/eladások megtekintése.`
* **Hirdetéskezelés (Eladói oldal):**
  * `Új termék feltöltése (cím, leírás, ár, kategória, állapot, képfeltöltés).`
  * `Saját hirdetések módosítása, törlése és státuszának állítása (Pl. *Aktív*, *Eladva*, *Inaktív*).`
* **Vásárlás és böngészés (Vevői oldal):**
  * `Termékek kilistázása, keresés kulcsszó alapján és szűrés kategóriák szerint.`
  * `Termék adatlapjának megtekintése képekkel és az eladó adataival.`
  * `Kosárkezelés és megrendelés leadása.`
* **Adminisztráció és moderáció:**
  * `Adminisztrátori szerepkör a nem megfelelő hirdetések eltávolítására és a szabályszegő felhasználók letiltására.`



### 2.3. Nem funkcionális követelmények

* **Technológiai stack:**
  * `Backend:` `PHP`
  * `Adatbázis:` `MySQL`
  * `Frontend:` `HTML5, CSS3 (tiszta CSS rendszer a reszponzivitásért).`
* **Biztonság:**
  * `Jelszavak biztonságos tárolása adatbázisban (password_hash / password_verify).`
  * `SQL Injection elleni védelem (Prepared Statements / PDO használata).`
  * `XSS (Cross-Site Scripting) elleni védelem a beviteli mezőknél.`
* **Teljesítmény és használhatóság:**
  * `Asztali böngészőkön reszponzív, jól használható felület.`
  * `Gyors oldalbetöltési idő és átlátható navigáció.`

## 3. Költség- és erőforrás-szükségletek

Az erőforrásigényünk összesen `57` személynap, átlagosan `19` személynap/fő.

A rendelkezésünkre áll összesen `3 * 70 = 210` pont.

```
Becsült sarokszámok, a rendelkezésre álló erőforrás fejenként általában 17-21 személynap, 
a pontok száma = fejenként a projektre kapható maxpont * tagok száma.
```

## 4. Szervezeti felépítés és felelősségmegosztás

`A projekt egyetemi célú. A Webshop projektet a mi csapatunk fogja végrehajtani, amely jelenleg három fejlesztőből áll. A csapatban található tapasztalt személyek akik számos sikeres projektten vannak túl.`
 - `Apró Dobos Gáspár (1 év egyetemi tapasztalat, technikumi képzés)`
 - `Kiss Dominik (1 év egyetemi tapasztalat, technikumi képzés)`
 - `Molnár Márton (több mint 1 év egyetemi tapasztalat)`


### 4.1 Projektcsapat

A projekt a következő emberekből áll:

| Név          | Pozíció          |   E-mail cím         |
|--------------|------------------|-------------------------------|
| `Apró Dobos Gáspár` | Projektmenedzser | `aprodobos2005@gmail.com`    |
| `Kiss Dominik` | Projekt tag      | `kiss.domo777@gmail.com`    |
| `Molnár Márton`   | Projekt tag      | ``    |


## 5. A munka feltételei

### 5.1. Munkakörnyezet

#### A projekt a következő munkaállomásokat fogja használni a munka során:

 - `Munkaállomások: 3 db, Windows 11-es operációs rendszerrel`
 - `Asztali számítógép (CPU: AMD Ryzen 5 5600, RAM: 32GB, GPU: AMD Radeon RX 6600)`
  - `Asztali számítógép (CPU: AMD Ryzen 5 7600, RAM: 32GB, GPU: AMD Radeon RX 7600xt )`

A projekt a következő technológiákat/szoftvereket fogja használni a munka során: 

 - `MD (Mark Down)`
 - `MYSQL (Adat Bázis)`
 - `PHP`
 - `VSC (Visual Studio Code)`
 - `Git verziókövető (GitHub)`
 


### 5.2. Rizikómenedzsment

| Kockázat leírása | Valószínűség | Hatás | Enyhítési / Elhárítási terv |
| :--- | :---: | :---: | :--- |
| ` Feladatok csúszása időhiány miatt` | `Közepes` | `Magas` | `Git hálózat és GitHub Issue-k rendszeres követése, heti sprint megbeszélések.` |
| ` Biztonsági hiányosságok (pl. SQL Injection)` | `Alacsony` | `Magas` | `Kizárólag PDO és előkészített lekérdezések (Prepared Statements) használata PHP-ban.` |
| `Adatbázis-architektúra tervezési hibái` | `Közepes` | `Közepes` | `Az ER-diagram alapos előzetes átbeszélése és normalizálása a kódolás megkezdése előtt.` |
| `Inkompatibilitási problémák a csapattagok között` | `Alacsony` | `Közepes` | `Közös Git konvenciók, egységes kötelező mappa- és fájlstruktúra meghatározása.` |
