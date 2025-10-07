<!-- Fichier : app/views/login.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <form method="POST" class="p-4 bg-white rounded shadow" style="width:300px;">
        <h4 class="mb-3 text-center">Entrez votre email</h4>
        <input type="email" name="email" class="form-control mb-3" placeholder="exemple@domaine.com" required>
        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
    </form>
</body>
</html>
