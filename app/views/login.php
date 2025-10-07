<?php
use Core\Language;

$lang = Language::load();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1><?= $lang['login_submit'] ?></h1>

    <form method="post" action="?page=login">
        <div class="mb-3">
            <label for="email" class="form-label"><?= $lang['login_email'] ?></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary"><?= $lang['login_submit'] ?></button>
    </form>

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
