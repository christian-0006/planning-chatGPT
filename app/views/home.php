<?php
use Core\Language;

$lang = Language::load();
$email = $_SESSION['email'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1><?= $lang['hello'] ?> !</h1>

    <?php if ($email): ?>
        <p><?= $lang['email_received'] ?> <?= htmlspecialchars($email) ?></p>
    <?php else: ?>
        <p>Utilisateur non connecté.</p>
    <?php endif; ?>

    <!-- Bouton Déconnexion -->
    <div class="mt-3">
        <a href="?page=logout" class="btn btn-danger">Déconnexion</a>
    </div>

    <!-- Sélecteur de langue -->
    <div class="mt-3">
        <span>Langue : </span>
        <a href="?page=changeLang&lang=fr">
            <img src="https://flagcdn.com/16x12/fr.png" alt="FR" class="me-1">
        </a>
        <a href="?page=changeLang&lang=en">
            <img src="https://flagcdn.com/16x12/gb.png" alt="EN">
        </a>
    </div>

</body>
</html>
