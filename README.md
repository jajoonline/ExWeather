# ExWeather - Počasie do Excelu

Tento projekt je jednoduchá webová aplikáci, ktorá:
- umožňuje používateľovi zadať mesto a dátum,
- načíta predpoveď počasia z OpenWeather API,
- a vygeneruje Excel súbor s údajmi na stiahnutie.

## 🧱 Použité technológie
- [Guzzle](https://github.com/guzzle/guzzle) – HTTP klient
- [PhpSpreadsheet](https://phpspreadsheet.readthedocs.io/) – export do Excelu
- [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) – správa `.env` premenných

## 💻 Inštalácia
1. Klonuj repozitár:
```bash
git clone https://github.com/tvoje-meno/weather-oop-app.git
```

2. Nainštaluj závislosti:
```bash
composer install
```

3. Vytvor `.env` súbor:
```
OPENWEATHER_API_KEY=fa71460b38c7460e4e2223a3b75bc738
```

4. Uisti sa, že priečinok `exports/` má práva na zápis.

