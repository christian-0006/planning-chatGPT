<?php
// login.php
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'fr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($lang['login_title'] ?? 'Connexion') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include APPROOT . '/views/partials/header.php'; ?>

<div class="container mt-5" style="max-width: 400px;">
    <h2 class="text-center mb-4"><?= htmlspecialchars($lang['login_heading'] ?? 'Se connecter') ?></h2>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label"><?= htmlspecialchars($lang['login_email'] ?? 'Email') ?></label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label"><?= htmlspecialchars($lang['login_password'] ?? 'Password') ?></label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100"><?= htmlspecialchars($lang['login_button'] ?? 'Connexion') ?></button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
