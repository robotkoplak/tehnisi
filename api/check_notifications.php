<?php
require_once '../config/database.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';
require_once '../classes/Notification.php';

header('Content-Type: application/json');

if (!isLoggedIn()) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

$userId = $_SESSION['user_id'];
$notification = new Notification($pdo);
$hasNewNotifications = $notification->hasNewNotifications($userId);

echo json_encode(['hasNewNotifications' => $hasNewNotifications]);
