<nav>
    <ul>
        <?php foreach (PAGES as $page_item): ?>
            <li><a href="<?= getUrl($page_item['action']); ?>"><?= $page_item['name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>