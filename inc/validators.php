<?php

/**
 * @param string $email
 * @return string|null
 */
function validateEmail(string $email) : string | null
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Incorrect email';
    }
    return null;
}

/**
 * @param string $phone
 * @return string|null
 */
function validatePhone(string $phone) : string | null
{
    if(!preg_match('/^\+?[0-9]\d{1,14}$/', $phone)){
        return 'Incorrect phone';
    }
    return null;
}

/**
 * @param string $name
 * @return string|null
 */
function validateName(string $name) : string | null
{
    if (empty($name)) {
        return "The name cannot be empty.";
    }

    $length = strlen($name);
    if ($length < 3 || $length > 20) {
        return "The name should be kept from 3 to 20 characters.";
    }

    return null;
}