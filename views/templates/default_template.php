<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo siteName; ?></title>
</head>

<body>
    <header>
        <?php include __DIR__ . '/../common/header.php'; ?>
    </header>
    <nav>
        <?php include __DIR__ . '/../common/menu.php'; ?>
    </nav>
    <main>
        <?php
        // Getting the action value from the GET parameter
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

        // Forming the path to the page file
        $pageFile = __DIR__ . '/../pages/' . $action . '_page.php';

        // Checking if the file exists
        if ($action && file_exists($pageFile)) {
            include $pageFile; // Include the page file if it exists
        } else {
            // If the file is not found, we display a 404 message
            echo '<h1>404 - Страница не найдена</h1>';
        }
        ?>
    </main>
    <footer>
        <?php include __DIR__ . '/../common/footer.php'; ?>
    </footer>
</body>

</html>
