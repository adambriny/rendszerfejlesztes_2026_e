<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ha már be van jelentkezve, irányítsuk a főoldalra
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

require_once _DIR_ . '/../config/db.php';

$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
        $errors[] = 'Add meg az e-mail címedet és a jelszavadat.';
    } else {
        try {
            $stmt = $pdo->prepare(
                'SELECT id, name, email, password_hash, role FROM users WHERE email = :email LIMIT 1'
            );
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_role'] = $user['role'] ?? 'user';
                $_SESSION['flash_success'] = 'Sikeres bejelentkezés! Üdv, ' . $user['name'] . '!';

                header('Location: index.php');
                exit;
            } else {
                $errors[] = 'Hibás e-mail cím vagy jelszó.';
            }
        } catch (PDOException $e) {
            $errors[] = 'Adatbázis hiba történt a bejelentkezés során.';
        }
    }
}

require_once _DIR_ . '/../includes/header.php';
?>

<main class="container auth-container">
    <h1>Bejelentkezés</h1>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="login.php" method="POST" class="auth-form" novalidate>
        <div class="form-group">
            <label for="email">E-mail cím</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Jelszó</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
    </form>

    <p class="auth-switch">
        Még nincs fiókod? <a href="register.php">Regisztrálj itt!</a>
    </p>
</main>

<?php require_once _DIR_ . '/../includes/footer.php'; ?>