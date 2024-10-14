<?php
$messages = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';

    require 'validators.php';

    // Валидация данных
    $nameError = validateName($name);
    $emailValid = validateEmail($email);
    $phoneValid = validatePhone($phone);

    if ($nameError) {
        $messages[] = $nameError;
    }
    if (!$emailValid) {
        $messages[] = "Invalid email format.";
    }
    if (!$phoneValid) {
        $messages[] = "Invalid phone number.";
    }

    if (empty($messages)) {
        echo "Data saved successfully.!";
    }
}
?>

<h1>Order</h1>
<form action="/index.php?action=proc" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="phone">Phone:</label><br>
    <input type="tel" id="phone" name="phone" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if (!empty($messages)) {
    echo "<ul>";
    foreach ($messages as $message) {
        echo "<li>" . htmlspecialchars($message) . "</li>";
    }
    echo "</ul>";
}
?>