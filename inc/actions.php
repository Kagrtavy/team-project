<?php

function index() {
    render('index');

}

function render($page, array $data = [], $template = 'default'){
    extract($data);
    include "views/templates/{$template}_template.php";
}

function form()
{
    render('form', ['errors' => getErrors()]);
}

function proc()
{
    $name = filter_var(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $phone = filter_var(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_var(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $errors = [];

    //Валидация данных

    if(empty($name)){
        $errors[] = 'Имя не может быть пустым';
    }
    if(empty($phone)){
        $errors[] = 'Телефон не может быть пустым';
    }
    if(empty($email)){
        $errors[] = 'Email не может быть пустым';
    }

    //если ошибки то сохранияем и переправляем на форму

    if($errors){
        setErrors($errors);
        header('Location: form_page.php?error=form');
        exit();
    }

    header('Location: index_page.php');
    exit();
}