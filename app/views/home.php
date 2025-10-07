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

<h1 id="home-title"><?= $lang['hello'] ?> !</h1>

<?php if ($email): ?>
    <p id="email-display" data-email="<?= htmlspecialchars($email) ?>">
        <?= $lang['email_received'] ?> <?= htmlspecialchars($email) ?>
    </p>
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
    <a href="#" data-lang="fr" class="lang-switch">
        <img src="https://flagcdn.com/16x12/fr.png" alt="FR" class="me-1">
    </a>
    <a href="#" data-lang="en" class="lang-switch">
        <img src="https://flagcdn.com/16x12/gb.png" alt="EN">
    </a>
</div>

<script>
// Changement de langue instantané
document.querySelectorAll('.lang-switch').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const lang = this.getAttribute('data-lang');

        fetch(`?page=changeLang&lang=${lang}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.json())
        .then(data => {
            document.querySelector('#home-title').textContent = data['hello'] + ' !';
            const emailElem = document.querySelector('#email-display');
            if(emailElem) {
                emailElem.textContent = data['email_received'] + ' ' + emailElem.dataset.email;
            }
        })
        .catch(err => console.error(err));
    });
});
</script>

</body>
</html>
