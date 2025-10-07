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

<h1 id="login-title"><?= $lang['login_submit'] ?></h1>

<!-- Formulaire login -->
<form method="post" action="?page=login">
    <div class="mb-3">
        <label for="email" class="form-label"><?= $lang['login_email'] ?></label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">
    <button type="submit" class="btn btn-primary"><?= $lang['login_submit'] ?></button>
</form>

<!-- Sélecteur de langue -->
<div class="mt-3">
    <span>Langue : </span>
    <a href="#" data-lang="fr" class="lang-switch">
        <img src="https://flagcdn.com/16x12/fr.png" alt="FR" class="me-1">
    </a>
    <a href="#" data-lang="en" class="lang-switch">
        <img src="https://flagcdn.com/16x12/gb.png" alt="EN">
    </a>
</div>

<script>
// Gestion du changement de langue sans reload
document.querySelectorAll('.lang-switch').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const lang = this.getAttribute('data-lang');

        fetch(`?page=changeLang&lang=${lang}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            document.querySelector('#login-title').textContent = data['login_submit'];
            document.querySelector('label[for="email"]').textContent = data['login_email'];
            document.querySelector('button[type="submit"]').textContent = data['login_submit'];
        })
        .catch(err => console.error(err));
    });
});
</script>

</body>
</html>
