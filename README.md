# ExWeather

Cieľ: Vytvoriť jednoduchú webovú aplikáciu, ktorá umožní používateľom odoslať formulár,
dotazovať sa na OpenWeather API, agregovať získané údaje a vracať ich vo formáte Excel na
stiahnutie.
Požiadavky:
1. Formulár:
Vytvoriť jednoduchý HTML formulár s nasledujúcimi políčkami:
- Mesto (textové pole)
- Dátum (date picker)
- Tlačidlo "Odoslať""

2. Backend:
o Použiť PHP na spracovanie údajov z formulára.
o Na základe zadaných údajov (mesto a dátum) dotazovať sa na OpenWeather
API na získanie údajov o počasí.
o Agregovať získané údaje do zrozumiteľnej štruktúry.

3. API dotaz:
Použiť OpenWeather API na získanie údajov o počasí. (Napríklad predpoveď
na konkrétny deň).

Zabezpečiť správne spracovanie odpovedí API a ošetrenie chýb.

4. Generovanie Excel súboru:
Použiť knižnicu podľa vlastného uváženia vytvorenie Excel súboru.
Do Excel súboru uložiť nasledovné údaje:
- Mesto
- Dátum
- Teplota
- Počasie (popis)
o Umožniť používateľovi stiahnuť tento Excel súbor po úspešnom spracovaní
požiadavky.

5. Používateľské rozhranie:
Po odoslaní formulára a spracovaní údajov, zobraziť správu o úspechu alebo
chybe.
Poskytnúť odkaz na stiahnutie Excel súboru.

