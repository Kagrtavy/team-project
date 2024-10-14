<nav>
    <ul>
        <?php foreach (pages as $page): ?>
            <li><a href="index.php?action=<?= $page['action']; ?>"><?= $page['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
