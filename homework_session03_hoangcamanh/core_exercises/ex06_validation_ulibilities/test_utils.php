<?php

/**
 * Sanitize input data by removing special characters
 */
function sanitize($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate email format
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate string length
 */
function validateLength($str, $min, $max) {
    $length = strlen($str);
    return $length >= $min && $length <= $max;
}

/**
 * Validate password (min 8 chars, at least one special character)
 */
function validatePassword($pass) {
    if (strlen($pass) < 8) {
        return false;
    }
    return preg_match('/[!@#$%^&*()_+\-=\[\]{};:\'",.<>?\/\\|`~]/', $pass) === 1;
}