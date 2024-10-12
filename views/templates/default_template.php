<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
</head>
<body>
<header>
    <?php include 'header.php';?>
</header>
<nav>
    <?php include 'menu.php';?>
</nav>
<main>
    <?php
    // Getting the page value from the GET parameter
    $pages = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

    // Forming the path to the page file
    $pageFile = 'pages/' . $pages . '.php';

    // Checking if the file exists
    if ($pages && file_exists($pageFile)) {
        include $pageFile; // Include the page file if it exists
    } else {
        // If the file is not found, we display a 404 message
        echo '<h1>404 - Страница не найдена</h1>';
    }
    ?>
</main>
<footer>
    <?php include 'footer.php';?>
</footer>
</body>
</html>
