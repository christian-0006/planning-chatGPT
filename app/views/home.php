<!-- Fichier : app/views/home.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="p-4 bg-white rounded shadow text-center">
        <h3>Bonjour 👋</h3>
        <p>J’ai bien reçu votre email :</p>
        <strong><?= htmlspecialchars($email) ?></strong>
        <br><br>
        <a href="?page=login" class="btn btn-secondary mt-3">Changer d'email</a>
    </div>
</body>
</html>
