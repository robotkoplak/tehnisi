<?php
session_start();

function setUserSession($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_role'] = $user['role'];
    $_SESSION['username'] = $user['username'];
}

function getUserData() {
    return [
        'id' => $_SESSION['user_id'] ?? null,
        'role' => $_SESSION['user_role'] ?? null,
        'username' => $_SESSION['username'] ?? null,
    ];
}

function login($username, $password) {
    global $pdo;
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        return true;
    }
    return false;
}

function logout() {
    session_destroy();
    redirect('/login.php');
}

function checkUserRole($requiredRole) {
    if (!isLoggedIn()) {
        redirect('/login.php');
    }

    $userRole = getUserRole();
    if ($userRole !== $requiredRole) {
        http_response_code(403);
        die("Akses ditolak");
    }
}
