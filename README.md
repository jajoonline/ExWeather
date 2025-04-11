# ExWeather - Počasie do Excelu

Tento projekt je jednoduchá webová aplikáci, ktorá:
- umožňuje používateľovi zadať mesto a dátum,
- načíta predpoveď počasia z OpenWeather API,
- a vygeneruje Excel súbor s údajmi na stiahnutie.

## Použité technológie
- [Guzzle](https://github.com/guzzle/guzzle) – HTTP klient
- [PhpSpreadsheet](https://phpspreadsheet.readthedocs.io/) – export do Excelu
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) – správa `.env` premenných

## Inštalácia
1. Klonuj repozitár:
```bash
git clone git@github.com:jajoonline/ExWeather.git
```

2. Nainštaluj závislosti:
```bash
composer install
```

3. Vytvor `.env` súbor:
```
OPENWEATHER_API_KEY=your_API_key
```

4. Uisti sa, že priečinok `exports/` má práva na zápis.

