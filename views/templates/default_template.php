<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Мой сайт</title>
    </head>
    <body>
        <?php include 'views/common/header.php';?>
        <?php include 'views/common/menu.php';?>
        <main>
            <?php include_once 'views/pages/'. $page . '_page.php'?>
        </main>
        <?php include 'views/common/footer.php';?>
    </body>
</html>
