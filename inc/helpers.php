<?php
session_start();
/**
 * Sets errors in the session.
 *
 * @param array $errors An array of errors to be recorded.
 */
function setErrors(array $errors)
{
    $_SESSION['errors'] = $errors;
}
/**
 * Get errors from the session.
 *
 * @return array An array of errors, if any, otherwise an empty array.
 */
function getErrors()
{
    if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Remove errors from the session after receiving
        return $errors;
    }
    return [];
}
function init()
{
    // Reading the GET parameter 'action' using filter_input
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

    // Checking if a function with the same name exists
    if ($action && function_exists($action)) {
        // Если функция существует, вызываем ее
        call_user_func($action);
    } else {
        // Generating a 404 error
        header("HTTP/1.0 404 Not Found");
        echo "Ошибка 404: Страница не найдена.";
        exit;
    }
}