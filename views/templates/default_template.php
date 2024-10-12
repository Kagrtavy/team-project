<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой сайт</title>
</head>
<body>

<header>
    <?php include 'menu.php';?>
</header>

<main>
    <?php
    $page = isset($page) ? $page : 'default_page'; // Set default value
    $filePath = 'pages/' . $page . '_page.php'; // Formation of the path to the file

    if (file_exists($filePath)) {
        include $filePath; // Connect the file if it exists
    } else {
        echo '<h1>404 - Страница не найдена</h1>';
    }
    ?>
</main>

<footer>
    <?php include 'footer.php';?>
</footer>

</body>
</html>
