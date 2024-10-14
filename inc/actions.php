<?php

/**
 *
 */
function index() : void
{
    render('index');
}

/**
 * @param string $page
 * @param array $data
 * @param string $template
 */
function render(string $page, array $data = [],string $template = 'default') : void
{
    extract($data);
    include "views/templates/{$template}_template.php";
}

/**
 *
 */
function form() : void
{
    render('form', ['errors' => getErrors()]);
}

/**
 *
 */
function proc() : void
{
    $name = htmlspecialchars(filter_input(INPUT_POST, 'name'));
    $phone = htmlspecialchars(filter_input(INPUT_POST, 'phone'));
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    //Валидация данных
    $errors = [];
    if($nameError = validateName($name)){
        $errors[] = $nameError;
    }
    if($phoneError = validatePhone($phone)){
        $errors[] = $phoneError;
    }
    if($emailError = validateEmail($email)){
        $errors[] = $emailError;
    }

    //если ошибки то сохранияем и переправляем на форму
    if(count($errors) > 0){
        setErrors($errors);
        redirect('form');
    }

    redirect('index');
}

/**
 * @param atring $action
 * @return never
 */
function redirect(string $action) : never
{
    header('Location: ' . getUrl($action));
    exit();
}