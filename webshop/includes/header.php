<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Piactér</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header class="navbar">
        <div class="container nav-content">
            <a href="index.php" class="logo">Piactér</a>
            <nav class="nav-links">
                <a href="index.php">Főoldal</a>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="create_listing.php">Hirdetés feladása</a>
                    <a href="profile.php">Profilom</a>
                    <?php if (($_SESSION['role'] ?? '') === 'admin'): ?>
                        <a href="admin.php">Admin</a>
                    <?php endif; ?>
                    <span class="user-badge">Szia, <?= htmlspecialchars($_SESSION['user_name'], ENT_QUOTES, 'UTF-8') ?>!</span>
                    <a href="logout.php" class="btn-outline">Kijelentkezés</a>
                <?php else: ?>
                    <a href="login.php">Bejelentkezés</a>
                    <a href="register.php" class="btn-primary">Regisztráció</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <main class="container main-content">