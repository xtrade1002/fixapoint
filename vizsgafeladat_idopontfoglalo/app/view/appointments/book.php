<h2>Időpontok listája</h2>
<a href="index.php?controller=appointment&action=create">Új időpont hozzáadása</a>

<ul>
    <?php foreach ($appointments as $appointment): ?>
        <li><?= htmlspecialchars($appointment['name']) ?> - <?= $appointment['date'] ?> <?= $appointment['time'] ?></li>
    <?php endforeach; ?>
</ul>
