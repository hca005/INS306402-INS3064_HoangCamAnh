<?php

/**
 * Sanitizes input data by removing HTML tags and whitespace
 * @param string $data The data to sanitize
 * @return string Sanitized data
 */
function sanitize($data) {
    return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
}

/**
 * Validates if a string is a valid email format
 * @param string $email The email to validate
 * @return bool True if valid email, false otherwise
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validates if a string length is within min and max bounds
 * @param string $str The string to validate
 * @param int $min Minimum length
 * @param int $max Maximum length
 * @return bool True if length is valid, false otherwise
 */
function validateLength($str, $min, $max) {
    $len = strlen($str);
    return $len >= $min && $len <= $max;
}

/**
 * Validates a password (minimum 8 chars and at least one special character)
 * @param string $pass The password to validate
 * @return bool True if password is valid, false otherwise
 */
function validatePassword($pass) {
    $hasSpecialChar = preg_match('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $pass);
    $length = strlen($pass) >= 8;
    return $length && $hasSpecialChar;
}