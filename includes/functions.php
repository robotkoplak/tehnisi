<?php
function redirect($url) {
    header("Location: $url");
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['user_role'] ?? null;
}

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function validateUsername($username) {
    return preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username);
}

function validateTicketTitle($title) {
    return strlen($title) >= 5 && strlen($title) <= 100;
}

function validateTicketDescription($description) {
    return strlen($description) >= 10 && strlen($description) <= 1000;
}

function validatePassword($password) {
    return strlen($password) >= 8 && preg_match('/[A-Za-z]/', $password) && preg_match('/\d/', $password);
}

// Tambahkan fungsi-fungsi lain yang diperlukan
