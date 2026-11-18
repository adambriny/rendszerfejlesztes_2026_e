<?php

require_once '../config/db.php';
require_once '../includes/header.php';
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php if (!empty($_SESSION['flash_success'])): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES, 'UTF-8') ?>
    </div>
    <?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<h1>Üdvözlünk az Online Piactéren!</h1>
<p>Böngéssz a meghirdetett termékek között, vagy regisztrálj és töltsd fel saját hirdetésedet.</p>

<?php require_once '../includes/footer.php'; ?>