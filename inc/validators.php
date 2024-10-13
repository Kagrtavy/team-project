<?php
function validateEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function validatePhone($phone) {
    return preg_match('/^\+?[0-9]\d{1,14}$/', $phone);
}
function validateName($name) {
    if (empty($name)) {
        return "The name cannot be empty.";
    }

    $length = strlen($name);
    if ($length < 3 || $length > 20) {
        return "The name should be kept from 3 to 20 characters.";
    }

    return null;
}