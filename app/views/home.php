<?php
// home.php
?>
<!DOCTYPE html>
<html lang="<?= $_SESSION['lang'] ?? 'fr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($lang['home_title'] ?? 'Accueil') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include APPROOT . '/views/partials/header.php'; ?>

<div class="container text-center mt-5">
    <h1><?= htmlspecialchars($lang['home_welcome'] ?? 'Bienvenue') ?></h1>
    <p class="lead"><?= htmlspecialchars($lang['home_description'] ?? '') ?></p>
    <p><?= htmlspecialchars($lang['email_received'] ?? 'J’ai bien reçu votre email :') ?> <strong><?= htmlspecialchars($email) ?></strong></p>
    <a href="?page=login" class="btn btn-secondary"><?= htmlspecialchars($lang['change_email'] ?? 'Changer d\'email') ?></a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
