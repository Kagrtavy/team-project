<h1>Order</h1>
<form action="/index.php?action=proc" method="post" novalidate>
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="phone">Phone:</label><br>
    <input type="tel" id="phone" name="phone" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if (!empty($errors)) {
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
}
?>
