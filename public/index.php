<?php
require_once '../config/database.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        require '../views/home.php';  // Pastikan path ini benar
        break;
    case 'login':
        require '../views/login.php';
        break;
    case 'admin/dashboard':
        checkUserRole('admin');
        require '../views/admin/dashboard.php';
        break;
    case 'technician/dashboard':
        checkUserRole('technician');
        require '../views/technician/dashboard.php';
        break;
    case 'reviewer/dashboard':
        checkUserRole('reviewer');
        require '../views/reviewer/dashboard.php';
        break;
    default:
        http_response_code(404);
        require '../views/404.php';  // Pastikan file ini ada
        break;
}
