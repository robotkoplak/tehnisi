<?php
require_once '../config/database.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        require '../views/home.php';
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
    // Tambahkan rute lainnya
    default:
        http_response_code(404);
        require '../views/404.php';
        break;
}
