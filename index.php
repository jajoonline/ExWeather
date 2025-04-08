<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Počasie – Export do Excelu</title>
</head>
<body>
    <h1>Získaj predpoveď počasia</h1>
    <form action="weather.php" method="POST">
        <label for="city">Mesto:</label>
        <input type="text" id="city" name="city" required>

        <label for="date">Dátum:</label>
        <input type="date" id="date" name="date" required>

        <button type="submit">Odoslať</button>
    </form>

    <?php if (isset($_GET['file'])): ?>
        <p>✅ Úspešne vygenerované!</p>
        <a href="exports/<?php echo htmlspecialchars($_GET['file']); ?>" download>Stiahnuť Excel</a>
    <?php elseif (isset($_GET['error'])): ?>
        <p style="color:red;">❌ Chyba: <?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
</body>
</html>