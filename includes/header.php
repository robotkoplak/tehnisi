<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Aplikasi Tiket Teknisi'; ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Aplikasi Tiket Teknisi</h1>
            <?php if (isLoggedIn()): ?>
                <nav>
                    <a href="/dashboard.php">Dashboard</a>
                    <a href="/logout.php">Logout</a>
                    <span id="notification-badge" style="display: none;">🔔</span>
                </nav>
            <?php endif; ?>
        </header>
