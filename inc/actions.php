<?php

function index()
{
    render('index');
}

function render($page, array $data = [], $template = 'default')
{
    extract($data);
    include "views/templates/{$template}_template.php";
}

function form()
{
    render('form', ['errors' => getErrors()]);
}

function proc()
{
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $errors = [];

    // Виконуємо валідацію
    $nameError = validateName($name);
    $emailValid = validateEmail($email);
    $phoneValid = validatePhone($phone);

    // Додаємо помилки до масиву
    if ($nameError) {
        $errors[] = $nameError;
    }
    if (!$emailValid) {
        $errors[] = "Invalid email format.";
    }
    if (!$phoneValid) {
        $errors[] = "Invalid phone number.";
    }

    // Якщо є помилки, зберігаємо їх і повертаємо на форму
    if ($errors) {
        setErrors($errors);
        header('Location: /index.php?action=form');
        exit();
    }

    // Якщо немає помилок, перенаправляємо на головну сторінку
    header('Location: /index.php?action=index');
    exit();
}
