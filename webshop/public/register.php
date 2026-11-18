<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ha már be van jelentkezve, irányítsuk a főoldalra
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/../config/db.php';

$errors = [];
$name = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['password_confirm'] ?? '';

    // Validáció
    if ($name === '' || mb_strlen($name) < 2) {
        $errors[] = 'A név megadása kötelező (legalább 2 karakter).';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Érvényes e-mail címet adj meg.';
    }

    if (mb_strlen($password) < 6) {
        $errors[] = 'A jelszónak legalább 6 karakter hosszúnak kell lennie.';
    }

    if ($password !== $passwordConfirm) {
        $errors[] = 'A két jelszó nem egyezik.';
    }

    // E-mail ellenőrzése és mentés az adatbázisba
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare('SELECT id FROM users WHERE email = :email LIMIT 1');
            $stmt->execute([':email' => $email]);

            if ($stmt->fetch()) {
                $errors[] = 'Ezzel az e-mail címmel már regisztráltak.';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $insert = $pdo->prepare(
                    'INSERT INTO users (name, email, password_hash) 
                     VALUES (:name, :email, :password_hash)'
                );
                $insert->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password_hash' => $passwordHash,
                ]);

                $_SESSION['flash_success'] = 'Sikeres regisztráció!';
                header('Location: index.php');
                exit;
            }
        } catch (PDOException $e) {
            $errors[] = 'Adatbázis hiba történt a regisztráció során.';
        }
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<main class="container auth-container">
    <h1>Regisztráció</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="register.php" method="POST" class="auth-form" novalidate>
        <div class="form-group">
            <label for="name">Teljes név *</label>
            <input
                type="text"
                id="name"
                name="name"
                value="<?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"
                required
                minlength="2"
            >
        </div>

        <div class="form-group">
            <label for="email">E-mail cím *</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Jelszó *</label>
            <input
                type="password"
                id="password"
                name="password"
                required
                minlength="6"
            >
        </div>

        <div class="form-group">
            <label for="password_confirm">Jelszó megerősítése *</label>
            <input
                type="password"
                id="password_confirm"
                name="password_confirm"
                required
                minlength="6"
            >
        </div>

        <button type="submit" class="btn btn-primary">Regisztráció</button>
    </form>

    <p class="auth-switch">
        Már van fiókod? <a href="login.php">Jelentkezz be itt!</a>
    </p>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>