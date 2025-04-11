<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Počasie - Excel export</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1>Ulož predpoveď predpoveď počasia do excelu</h1>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">Chyba: <?= htmlspecialchars($_GET['error']) ?></div>
        <?php endif; ?>

        <?php if (isset($_GET['file'])): ?>
            <div class="alert alert-success">
                Excel súbor pripravený: <a href="exports/<?= htmlspecialchars($_GET['file']) ?>">Stiahnuť</a>
            </div>
        <?php endif; ?>

        <form method="POST" action="process.php" class="form">
            <div class="form-group">
                <label for="city">Mesto:</label>
                <input type="text" name="city" id="city" required>
            </div>

            <div class="form-group">
                <label for="date">Dátum:</label>
                <input type="date" name="date" id="date" required>
            </div>

            <button type="submit">Uložiť</button>
        </form>
    </div>
</body>
</html>