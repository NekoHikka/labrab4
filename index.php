
<?php
$counterFile = 'counter.txt';
try {
    if (!file_exists($counterFile)) {
        if (!file_put_contents($counterFile, 0)) {
            throw new Exception("Не вдалося створити файл лічильника.");
        }
    }
    chmod($counterFile, 0666);
    $currentCount = (int)file_get_contents($counterFile);
    $currentCount++;
    if (file_put_contents($counterFile, $currentCount) === false) {
        throw new Exception("Не вдалося записати дані у файл.");
    }
    echo "<h1>Кількість відвідувань цієї сторінки: $currentCount</h1>";
} catch (Exception $e) {
    echo "<h1>Сталася помилка: " . htmlspecialchars($e->getMessage()) . "</h1>";
}
?>